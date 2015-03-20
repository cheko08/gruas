<?php
/**
* 
*/
class AccountController extends BaseController
{

  /**
   * [getSignOut description]
   * @return [type] [description]
   */
  public function getSignOut()
  {
  	Auth::logout();
    Session::flush();
    return Redirect::route('home');
}


    /**
     * Display Sign In View
     * @return View  Sign in form
     */
    public function getSignIn()
    {
    	return View::make('account.signin')->with('link','Iniciar Sesion');
    }

    /**
     * Validate Sign In
     * @return 
     */
    public function postSignIn()
    {
    	$validator = Validator::make(Input::all(), 
    		array(
    			'user'     => 'required',
    			'password'  =>  'required'
    			),
    		array(
    			'required' => 'Este campo es requerido',
    			));

    	if($validator->fails())
    	{
    		return Redirect::route('sign-in-account')
    		->withErrors($validator)
    		->withInput();
    	} 


            //Verify is the checkbox for remember me is flagged
    	$remember = (Input::has('remember')) ? true : false;
            //atemp user sign in
    	$auth = Auth::attempt(array(
    		'username'     =>  Input::get('user'),
    		'password'  =>  Input::get('password'),
    		'active'    =>  1
    		),$remember);

    	if($auth)
    	{

    		return Redirect::intended('/');

    	} 

    	return Redirect::route('sign-in-account')
    	->with('signin','El Usuario o contraseña son incorrectos o tu cuenta esta inactiva.');

    }

    /**
     * Display Create Account View
     * @return View Account create form
     */
    public function getCreate()
    {
    	return View::make('account.create')->with('link','Crear Cuenta');
    }

    /**
     * Create the User account
     * @return Boolean if True account is created, if False redirect to home.
     */
    public function postCreate()
    {
    	$validator = Validator::make(Input::all(),
            array(
                'user'         =>  'required|max:60|unique:users,username',
                'nombre'      =>  'required|max:20|min:1',
                'password'      =>  'required|min:6',
                'role'   =>  'required'
                ),
            array(
                'required' => 'Campo Obligatorio',
                'unique'        => 'Este usuario ya existe en la base de datos',
                ));
        if($validator->fails()){
            return Redirect::route('create-account')
            ->withErrors($validator)
            ->withInput();

    	}else{

            //echo "succes!";

    		$user      =   Input::get('user');
    		$name       =   Input::get('nombre');
    		$apellido   =   Input::get('apellido');
            $password   =   Input::get('password');
            $role       =   Input::get('role');
            //Activation Code

            $user = User::create(array(
             'username'      =>  $user,
             'first_name'    =>  $name,
             'last_name'     =>  $apellido,
             'password'      =>  Hash::make($password),
             'role'          =>  $role,
             'active'        =>  1,
             ));

            if($user){


                   // echo "succes!";
                return Redirect::route('create-account')
                ->with('create','La cuenta ha sido creada!');

            }

            return Redirect::route('create-account')
            ->with('create-error','Hubo un problema al crear la cuenta.');
        }

    }


    /**
     * Display view for change passowrd
     * @return View change password view
     */
    public function getChangePassword()
    {
    	return View::make('account.password')->with('link','Cambiar Contraseña');
    }


    public function postChangePassword()
    {
    	$validator = Validator::make(Input::all(),
    		array(
    			'old-password'      =>  'required|min:6',
    			'password'      =>  'required|min:6',
    			'repeat-password'   =>  'required|same:password'
    			),
    		array(
    			'required' => 'Campo Requerido',
    			'same'      => 'Las contraseñas no son iguales',
    			));
    	if($validator->fails()){
    		return Redirect::route('change-password')
    		->withErrors($validator);
    	}else{

    		$user           = User::find(Auth::user()->id);
    		$oldPAssword    = Input::get('old-password');
    		$newPassword    = Input::get('password');

    		if(Hash::check($oldPAssword,$user->getAuthPassword())){

    			$user->password = Hash::make($newPassword);
    			$user->save();

    			return Redirect::route('home')
    			->with('global','Tu contraseña ah sido cambiada!');

    		}

    		return Redirect::route('change-password')
    		->with('change-password','Tu contraseña actual es incorrecta');
    	}

    	return Redirect::route('change-password')
    	->with('change-password','Hubo un problema!');
    }


    public function cuentas()
    {

      $cuentas = User::all();
      return View::make('account.cuentas', array(
        'link'    =>  'Cuentas',
        'cuentas' =>  $cuentas
        ));
    }

    public function deleteCuenta($id)
    {
      User::destroy($id);
      return Redirect::route('cuentas');
    }

   
}