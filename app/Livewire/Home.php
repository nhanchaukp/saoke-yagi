<?php

namespace App\Livewire;

use App\Models\SaoKe;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class Home extends Component
{
    use WithPagination, WithoutUrlPagination;
    #[Validate('required')]
    public $turnstileResponse;

    public string $title='Sao Kê VAR 🕵️‍♂️';
    public $query;
    public $f_query;
    public $search_arr;
    public $transaction_total, $total_money;

    public function messages()
    {
        return [
            'turnstileResponse.required' => 'Vui lòng xác thực captcha.',
            Turnstile::class => 'Xác thực captcha không hợp lệ.'
        ];
    }

//    public function rules()
//    {
//        return [
//            'query' => 'required',
//            'turnstileResponse' => ['required', Rule::turnstile()]
//        ];
//    }

    public function searchAction(): void
    {
        $this->validate();
        $this->f_query = Str::replace(' ', '%', $this->query);
        $this->resetPage();
    }

    public function render()
    {
        $this->transaction_total = SaoKe::count();
        $this->total_money = SaoKe::sum('amount');
        if($this->f_query){
            $this->search_arr = explode('%', $this->f_query);
            $results = SaoKe::whereLike('content', '%'.$this->f_query.'%')->paginate(15);
        } else{
            $results = null;
        }

        return view('livewire.home', [
            'results' => $results
        ])->layout('layouts.guest')->title($this->title);
    }
}
