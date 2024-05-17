<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordGeneratorController extends Controller
{
    private $symbols = ['!', '#', '$', '%', '&', '(', ')', '*', '+', '@', '^'];
    private $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    private $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private $numbers = '0123456789';

    public function index()
    {
        return view('password-generator');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'length' => 'required|integer|min:8',
            'include_lowercase' => 'required|boolean',
            'include_uppercase' => 'required|boolean',
            'include_numbers' => 'required|boolean',
            'include_symbols' => 'required|boolean',
        ]);

        $length = $request->input('length');
        $includeLowercase = $request->boolean('include_lowercase');
        $includeUppercase = $request->boolean('include_uppercase');
        $includeNumbers = $request->boolean('include_numbers');
        $includeSymbols = $request->boolean('include_symbols');

        $characters = '';
        if ($includeLowercase) {
            $characters .= $this->lowercase;
        }
        if ($includeUppercase) {
            $characters .= $this->uppercase;
        }
        if ($includeNumbers) {
            $characters .= $this->numbers;
        }
        if ($includeSymbols) {
            $characters .= implode('', $this->symbols);
        }

        if (empty($characters)) {
            return redirect()->back()->withErrors(['error' => 'You must select at least one character set to include.']);
        }

        $password = $this->generatePassword($length, $characters);

        return view('password-generator', ['password' => $password]);
    }

    private function generatePassword($length, $characters)
    {
        $charactersLength = strlen($characters);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }
        return $password;
    }
}
