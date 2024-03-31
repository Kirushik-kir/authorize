<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'feed']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = auth()->user()->id;

        // Add user_id into payload JWT
        $token = auth()->claims(['user_id' => $userId])->attempt($credentials);

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct',
            'email.unique' => 'Email is already taken',
        ];

        // Validate email
        $validatorEmail = Validator::make($request->all(), $rules = [
            'email' => 'required|email:rfc,dns|unique:users,email'
        ], $messages);

        if ($validatorEmail->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'error' => $validatorEmail->errors(),
            ]);
        }

        // Validate password
        // 
        // Password streight check regex at least shoud be
        // 
        // 1 English uppercase character (A – Z)
        // 1 English lowercase character (a – z)
        // 1 digit (0 – 9)
        // 1 Non-alphanumeric symbol (For example: !, $, #, or %)
        // Unicode characters
        $validatorPassword = Validator::make($request->all(), $rules = [
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ], $messages);

        if ($validatorPassword->fails()) {
            return response()->json([
                'error' => 'Weak password',
            ]);
        }

        $email = $validatorEmail->validated()['email'];
        $password = $validatorPassword->validated()['password'];

        $user = User::create([
            'email' => $email,
            'password' => $password,
        ]);

        $password_check = iconv_strlen($password) > 8 ? 'perfect' : 'good';

        return response()->json([
            'user_id' => $user->id,
            'password_check_status' => $password_check
        ]);
    
    }

    public function feed()
    {
        // $token = request()->bearerToken();
        // $credentials = Auth::guard('api')->check();
        // dd(Auth::guard('api')->check());
        // $token = auth('api')->attempt($credentials);

        if (auth()->check()) {
            return response()->json([]);
        }
        
        return response()->json(['error' => 'Unauthorized'], 401);
    }
        
    
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
