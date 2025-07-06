<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Filament\Forms\Form;


class UploadBukti extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';
    protected static ?string $title = 'Upload Bukti';
    protected static string $view = 'filament.pages.upload-bukti';

    public ?int $id_pengiriman = null;

    public array $data = [];

    public function mount(Request $request): void
    {
        $this->id_pengiriman = $request->id;
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('foto')
                ->label('Foto Bukti Pengiriman')
                ->image()
                ->required()
                ->disk('public')
                ->directory('images'),
            TextInput::make('catatan')
                ->label('Catatan Tambahan')
                ->maxLength(255),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $path = $data['foto'];

        Tracking::create([
            'id_pengiriman' => $this->id_pengiriman,
            'status' => 'Terkirim',
            //'nama_kurir' => Auth::user()->name,
            'foto_bukti' => $path,
            'catatan' => $data['catatan'] ?? null,
        ]);



        session()->flash('success', 'Bukti pengiriman berhasil diupload!');
        return redirect()->route('filament.admin.pages.dashboard-kurir');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->role === 'kurir';
    }

    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role === 'kurir';
    }
}
