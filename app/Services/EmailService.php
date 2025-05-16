<?php namespace App\Services;

use CodeIgniter\Email\Email;

class EmailService
{
    public function enviarConCredencialesUsuario($userEmail, $userPassword, $datosCorreo)
    {
        $email = \Config\Services::email();
        
        $config = [
            'SMTPHost'   => 'smtp.gmail.com',
            'SMTPUser'   => $userEmail,
            'SMTPPass'   => $userPassword,
            'SMTPPort'   => 587,
            'SMTPCrypto' => 'tls',
            'mailType'   => 'html',
            'charset'    => 'utf-8'
        ];
        
        $email->initialize($config);
        
        $email->setFrom($userEmail, $datosCorreo['nombre_from'] ?? '');
        $email->setTo($datosCorreo['destinatario']);
        $email->setSubject($datosCorreo['asunto']);
        $email->setMessage(view($datosCorreo['vista'], $datosCorreo['datos']));
        
        if (!$email->send()) {
            log_message('error', $email->printDebugger(['headers']));
            return false;
        }
        
        return true;
    }
}