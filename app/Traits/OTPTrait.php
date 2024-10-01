<?php

namespace App\Traits;

use App\Models\OTP;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait OTPTrait
{

    public function attempt($mobile, $code)
    {
        $otpModel = $this->findUserByMobile($mobile);

        if (!$otpModel) {
            return false;
        }

        if ($otpModel->otp == $code && $otpModel->otp_expire_at > date('Y-m-d H:i:s', strtotime("now"))) {

            $otpModel->update(['otp' => null, 'otp_expire_at' => null]);

            return true;
        }

        return false;
    }

    public function otpRequest($user): OTP
    {
        if ($otp = $this->findUserByMobile($user->mobile)) {
            $otp = $this->regenerateOtp($otp);
        } else {
            $otp = $this->createOtpRelation($user->id, $user->email, $user->mobile);
        }

        return $otp;
    }

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

    public function findUserByEmail($email)
    {
        return OTP::query()->where('email', $email)->first();
    }

    public function findUserByMobile($mobile)
    {
        return OTP::query()->where('mobile', $mobile)->first();
    }

    public function createOtpRelation($user_id, $email, $mobile)
    {
        return OTP::create([
            'user_id' => $user_id,
            'email' => $email,
            'mobile' => $mobile,
            'otp' => $this->generateCode(),
//            'type' => $type,
            'otp_expire_at' => date('Y-m-d H:i:s', strtotime("+5 min")),
        ]);
    }

    public function normalizePhoneNumber($mobile)
    {
        if (preg_match('/^(09)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
            return '98' . substr($mobile, 1);
        } else if (preg_match('/^(9)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
            return '98' . $mobile;
        } else if (preg_match('/^(0989)[0-9]{9}$/', $mobile, $matches, PREG_OFFSET_CAPTURE, 0)) {
            return substr($mobile, 1);
        } else {
            return $mobile;
        }
    }

    public function guard()
    {
        return Auth::guard('web');
    }

}
