<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FileController extends AbstractController
{
    #[Route('/fileImport', name: 'file_import')]
    public function importFile(Request $request): JsonResponse
    {
        if($request->getMethod() == "POST"){
            $data = $request->getContent();
            
            //stocké les info dans la bdd et retourné l'id

            return $this->json([
                //'id' => "",
                'message' => 'Your file has been imported',
                'data' => json_decode($data, true)
            ],Response::HTTP_OK);
        }else{
            return $this->json([
                'error' => 'Please send the right data with the right http method',
            ],Response::HTTP_METHOD_NOT_ALLOWED);
        }

    }

    #[Route('/fileExport', name: 'file_export')]
    public function sendObservationsFile(): JsonResponse
    {
        return $this->json([
            'message' => 'Your file has been sent',
        ],Response::HTTP_OK); 
    }
}
