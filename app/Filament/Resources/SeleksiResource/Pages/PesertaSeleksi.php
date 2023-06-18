<?php

namespace App\Filament\Resources\SeleksiResource\Pages;

use App\Filament\Resources\SeleksiResource;
use Filament\Resources\Pages\Page;

use Filament\Tables;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Seleksi;
use App\Models\SeleksiPeserta;
use App\Models\ViewSeleksiPeserta;
use App\Models\ViewFormulirPeserta;

class PesertaSeleksi extends Page implements Tables\Contracts\HasTable
{
    protected static string $resource = SeleksiResource::class;
    protected static string $view = 'filament.resources.seleksi-resource.pages.peserta-seleksi';
    //mengaktifkan table
    use Tables\Concerns\InteractsWithTable;
    //saat class dipanggil membawa id_seleksi
    public $id_seleksi;

    public function mount($record)
    {
        $this->id_seleksi = $record;
    }


    protected function getTitle(): string
    {
        $seleksi = Seleksi::find($this->id_seleksi);
        return "Peserta Seleksi : " . $seleksi->tahap . " / " . $seleksi->tanggal;
    }
    //membuat query untuk menampilkan data
    protected function getTableQuery()
    {
        return ViewSeleksiPeserta::query()->where("id_seleksi", $this->id_seleksi);
    }
    //membuat kolom table
    protected function getTableColumns()
    {
        return [
            Tables\Columns\TextColumn::make('no_daftar')
                ->label("No Daftar"),
            Tables\Columns\TextColumn::make('nama')
                ->label("Nama"),
            Tables\Columns\TextColumn::make('telp')
                ->label("No. Telp"),
            Tables\Columns\TextColumn::make('programStudi.nama_prodi'),
            Tables\Columns\TextColumn::make('hasil')
                ->label("Hasil")
                ->enum([
                    '0' => 'Proses Seleksi',
                    '1' => 'Lulus',
                    '2' => 'Gagal',
                ])
        ];
    }

    protected function getTableBulkActions()
    {
        return [
            Tables\Actions\BulkAction::make('Hapus')
                ->action(function (Collection $records) {
                    foreach ($records as $item) {
                        SeleksiPeserta::destroy($item->id);
                    }
                })
                ->deselectRecordsAfterCompletion()
                ->requiresConfirmation()
        ];
    }
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('Hasil')
                ->icon('heroicon-s-tag')
                ->form([
                    Forms\Components\Select::make('hasil')
                        ->label('Hasil Seleksi')
                        ->options([
                            '0' => 'Proses Seleksi',
                            '1' => 'Lulus',
                            '2' => 'Gagal',
                        ])
                        ->required(),
                ])
                ->action(function (ViewSeleksiPeserta $record, array $data) {
                    SeleksiPeserta::where('id', $record->id)
                        ->update(['hasil' => $data['hasil']]);
                })
        ];
    }
    public function simpan($data)
    {
        $dataForm['id'] = $this->id_seleksi . "-" . $data["no_daftar"];
        $dataForm['id_seleksi'] = $this->id_seleksi;
        $dataForm['id_formulir'] = $data["no_daftar"];
        $dataForm['hasil'] = 0;
        SeleksiPeserta::create($dataForm);

        Notification::make()
            ->title('Berhasil Simpan')
            ->success()
            ->send();
    }

    protected function getActions(): array
    {
        return [
            Action::make('tambah')
                ->label('Tambah Peserta')
                ->form([
                    Forms\Components\Select::make('no_daftar')
                        ->label('Cari Pendaftar')
                        ->searchable()
                        ->getSearchResultsUsing(function ($search) {
                            return ViewFormulirPeserta::select(
                                "no_daftar",
                                DB::raw("CONCAT(no_daftar,' - ',nama) as label")
                            )->where(
                                    'nama',
                                    'like',
                                    "%" . $search . "%"
                                )->whereNull("id_seleksi")->limit(5)->pluck('label', 'no_daftar');
                        })
                        ->required(),
                ])
                ->action(function (array $data) {
                    $this->simpan($data);
                })
        ];
    }
}