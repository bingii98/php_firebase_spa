<?php

use Kreait\Firebase\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require './vendor/autoload.php';

class MyService
{
    protected $auth;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount('./secret/key.json');
        $this->auth = $factory->createAuth();
    }

    public function login($username, $password)
    {
        try {
            $user_rs = $this->auth->getUserByEmail($username);
            $this->auth->signInWithEmailAndPassword($username, $password);
            return $user_rs;
        } catch (Exception $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return false;
        }
    }

    public function get($uid)
    {
        try {
            $result = $this->auth->getUser($uid);
            if(isset($result->customAttributes['isAdmin']))
                $admin = true;
            else
                $admin = false;
            $userSignedIn = new User($result->uid,$result->displayName,$result->email,$result->photoUrl,$admin,$result->metadata->lastLoginAt,$result->disabled);
            return $userSignedIn;
        } catch (Exception $e) {
            return null;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return null;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return null;
        }
    }

    public function forgot_password($username)
    {
        try {
            $this->auth->sendPasswordResetLink($username);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function check_email_exist($username)
    {
        try {
            $this->auth->getUserByEmail($username);
            return true;
        } catch (Exception $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return false;
        }
    }

    public function change_email_verification($uid, $username)
    {
        try {
            $properties = [
                'emailVerified' => false
            ];
            $this->auth->changeUserEmail($uid, $username);
            $this->auth->updateUser($uid,$properties);
            $this->auth->sendEmailVerificationLink($username);
            return true;
        } catch (Exception $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return false;
        }
    }

    public function change_name_display($uid, $name)
    {
        try {
            $properties = [
                'displayName' => $name
            ];
            $this->auth->updateUser($uid,$properties);
            return true;
        } catch (Exception $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return false;
        }
    }

    public function send_email_verification($username)
    {
        try {
            $this->auth->sendEmailVerificationLink($username);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function set_admin($uid,$value)
    {
        try {
            $this->auth->setCustomUserAttributes($uid, ['isAdmin' => $value]);
            return true;
        } catch (Exception $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\AuthException $e) {
            return false;
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return false;
        }
    }

}
