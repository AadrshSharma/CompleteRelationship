  public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
            return Redirect::to(Session::get('previous_url'));
//             return redirect()->intended('/')
//                ->withSuccess('You have Successfully loggedin');
        }

        return back()->withInput()->withErrors([
            'error' => 'Wrong email or password.',
        ]);
    }

    public function userRegistration(Request $request)
    {

        $data = $request->all();

        // Build the validation constraint set.
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'phone_number' => 'required|digits:10'
        );

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            // Normally we would do something with the data.
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'password' => Hash::make($data['password']),
                'role_id' => 4
            ]);

            Auth::login($user);

            return redirect("/")->withSuccess('Great! You have Successfully loggedin');
        }

        return back()->withErrors($validator)->withInput();
    }
