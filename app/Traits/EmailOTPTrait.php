<?php


namespace App\Traits;


use App\Models\OTP;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

trait EmailOTPTrait
{
    /**
     * @param $mobile
     *
     * @throws ValidationException
     */
    public function otpRequest($user): OTP
    {
        $email = $this->validateOTPRequest($user->email);

        if ($otp = $this->getByEmail($email)) {

            $otp = $this->regenerateOtp($otp);

        } else {
//            $user = $this->createUser();

            $otp = $this->createOtpRelation($user->id, $user->email, $user->mobile);
        }

        return $otp;
    }

    /**
     * @param $email
     *
     * @return bool|string
     * @throws ValidationException
     */
    protected function validateOTPRequest($email)
    {
//        $mobile = $this->normalizePhoneNumber($mobile);

        Validator::validate(['email' => $email], [
            '$email' => ['required'],
        ]);

        return $email;
    }

    /**
     * normalize mobile numbers
     *
     * @param $mobile
     *
     * @return bool|string
     */
//    public function normalizePhoneNumber($mobile)
//    {
//        if (preg_match('/^(09)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
//            return '98' . substr($mobile, 1);
//        } else if (preg_match('/^(9)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
//            return '98' . $mobile;
//        } else if (preg_match('/^(0989)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
//            return substr($mobile, 1);
//        } else {
//            return $mobile;
//        }
//    }

    /**
     * @param $mobile
     *
     * @return mixed
     */
    public function getByEmail($email)
    {
        return OTP::whereEmail($email)->first();
    }

    /**
     * @param OTP $otp
     *
     * @return OTP
     */
    public function regenerateOtp(OTP $otp): OTP
    {
        $otp->update([
            'otp' => $this->generateCode(),
            'otp_expire_at' => date('Y-m-d H:i:s', strtotime("+5 min")),
        ]);

        return $otp->refresh();
    }

    /**
     * @return string
     */
    public function generateCode($length = 4)
    {
        $characters = "123456789";

        $randomChars = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChars .= $characters[rand(1, 8)];
        }

        return $randomChars;
    }

    /**
     * @param array $data
     *
     * @return User|Model
     */
//    public function createUser($data = [])
//    {
//        return User::create(['mobile' => $data]);
//    }

    /**
     * @param $user_id
     * @param $mobile
     *
     * @return mixed
     */
    public function createOtpRelation($user_id, $email = null, $mobile)
    {
        return OTP::create([
            'user_id' => $user_id,
            'user_type' => User::class,
            'email' => $email,
            'mobile' => $mobile,
            'otp' => $this->generateCode(),
//            'type' => $type,
            'otp_expire_at' => date('Y-m-d H:i:s', strtotime("+5 min")),
        ]);
    }

    /**
     * @param $mobile
     * @param $code
     *
     * @return bool|Response
     * @throws ValidationException
     */
    public function login($email, $code)
    {

        $mobile = $this->validateLogin($email, $code);

        if (!$token = $this->attempt($email, $code)) {
            return $this->sendFailedLoginResponse();
        }

        return $this->sendLoginResponse();
    }

    /**
     * @param $mobile
     * @param $code
     *
     * @return bool|string
     */
    protected function validateLogin($email, $code)
    {
//        $mobile = $this->normalizePhoneNumber($mobile);

        Validator::validate(['email' => $email, 'code' => $code], [
            'mobile' => ['required',],
            'code' => ['required', 'numeric'],
        ]);

        return $email;
    }

    /**
     * @param $email
     * @param $code
     *
     * @return bool|string
     */
    public function attempt($email, $code)
    {
        $otpModel = $this->getByEmail($email);

        if (!$otpModel) {
            return false;
        }

        if ($otpModel->otp == $code && $otpModel->otp_expire_at > date('Y-m-d H:i:s', strtotime("now"))) {

            $otpModel->update(['otp' => null, 'otp_expire_at' => null]);

            return $this->guard()->login($otpModel->user);
        }

        return false;
    }

    /**
     * @return Guard|StatefulGuard
     */
    public function guard()
    {
        return Auth::guard('web');
    }

    /**
     * Get the failed login response instance.
     *
     * @return Response
     */
//    protected function sendFailedLoginResponse()
//    {
//        throw ValidationException::withMessages([
//            'mobile' => [trans('auth.failed')],
//        ]);
//    }

    /**
     * Send the response after the user was authenticated.
     *
     * @return JsonResponse
     */
//    protected function sendLoginResponse()
//    {
//        return redirect()->intended($this->redirectPath());
//    }

    /**
     * @return string
     */
//    public function redirectPath()
//    {
//        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
//    }

    /**
     *
     */
    public function logout()
    {
        $this->guard()->logout();

        return $this->sendLogoutResponse();
    }

    /**
     * Send the response after the user was logout.
     *
     * @return JsonResponse
     */
    protected function sendLogoutResponse()
    {
        return redirect()->intended($this->redirectPath());
    }

    public function findUserByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }

}
