<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeleksiResource\Pages;
use App\Filament\Resources\SeleksiResource\RelationManagers;
use App\Models\Seleksi;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use League\Flysystem\Visibility;
use PhpParser\Node\Stmt\Label;
use Symfony\Contracts\Service\Attribute\Required;

use App\Models\Periode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

class SeleksiResource extends Resource
{
    protected static ?string $model = Seleksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_periode')
                    ->label('Periode')
                    ->default(Periode::where("aktif", 1)->pluck('id')->first())
                    ->required()
                    ->disabled(),

                // ->disabled(),
                Forms\Components\TextInput::make('tahap')
                    ->label('Tahap')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->displayFormat('d/m/Y')
                    ->required(),
                Forms\Components\TextInput::make('keterangan')
                    ->label('Keterangan ')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id'),

                Tables\Columns\TextColumn::make('id_periode')
                    ->Label('Periode'),

                Tables\Columns\TextColumn::make('tahap')
                    ->Label('Tahap'),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->label('Tanggal Seleksi'),


                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan'),


                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('Peserta')
                    ->icon('heroicon-s-user-group')
                    ->url(function (Seleksi $record) {
                        return SeleksiResource::getUrl('peserta', $record);
                    })
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeleksis::route('/'),
            'create' => Pages\CreateSeleksi::route('/create'),
            'edit' => Pages\EditSeleksi::route('/{record}/edit'),
            'peserta' => Pages\PesertaSeleksi::route('/{record}/peserta'),
        ];
    }

}