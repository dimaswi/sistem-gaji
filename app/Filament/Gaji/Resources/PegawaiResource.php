<?php

namespace App\Filament\Gaji\Resources;

use App\Exports\PegawaiExport;
use App\Filament\Exports\PegawaiExporter;
use App\Filament\Gaji\Resources\PegawaiResource\Pages;
use App\Filament\Gaji\Resources\PegawaiResource\RelationManagers;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Http;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nama_pegawai')
                        ->placeholder('Masukan Nama Pegawai')
                        ->required(),
                    TextInput::make('nip')
                        ->placeholder('Masukan Nomor Induk Pegawai')
                        ->label('Nomor Induk Pegawai')
                        ->required(),
                    TextInput::make('nomor_whatsapp')
                        ->placeholder('Masukan Nomor Whatsapp Pegawai')
                        ->numeric()
                        ->required()
                        ->default(62)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(
                fn(Pegawai $record) => PegawaiResource::getUrl('thp', ['record' => $record->id])
            )
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->alignCenter()
                    ->rowIndex()
                    ->extraHeaderAttributes([
                        'style' => 'width:5%'
                    ]),
                TextColumn::make('nama_pegawai')
                    ->searchable(),
                TextColumn::make('nip')
                    ->label('Nomor Induk Pegawai')
                    ->searchable(),
                TextColumn::make('nomor_whatsapp')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                BulkAction::make('kirim')
                    ->label('Kirim Pesan WhatsApp')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->action(function (Collection $records) {
                        // dd($records);
                        foreach ($records as $key => $value) {
                            // dd($value['nomor_whatsapp']);
                            $url_api = 'http://147.93.104.139:5000/send-text-message?cred_id=085232738966';
                            $data = [
                                'phone_number' => $value['nomor_whatsapp'],
                                'message' => 'TEST KIRIM 2',
                            ];

                            $headers = array(
                                'Content-Type: application/json',
                                );

                            $ch = curl_init();

                            curl_setopt($ch, CURLOPT_URL, $url_api);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt(
                                $ch,
                                CURLOPT_POSTFIELDS,
                                json_encode($data)
                            );

                            // Receive server response ...
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            $server_output = curl_exec($ch);

                            curl_close($ch);

                            dd($server_output);
                        }
                    })
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(PegawaiExporter::class)
                // ->exporter(PegawaiExporter::class)
            ]);;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
            'thp' => Pages\InputTHP::route('/{record}/thp'),
        ];
    }
}
