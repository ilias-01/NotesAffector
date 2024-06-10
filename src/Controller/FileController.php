<?php

namespace App\Controller;

use App\Entity\File;
use App\Repository\FileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FileController extends AbstractController
{
    #[Route('/fileImport', name: 'file_import')]
    public function importFile(Request $request,FileRepository $fileRep): JsonResponse
    {
        if($request->getMethod() == "POST"){
            $data = $request->getContent();
            $data = json_decode($data, true);

            //stocké les info dans la bdd et retourné l'id -- not useful
            $file = new File();
            $file->setFileName("generic Name");
            $file->setDataArray($data['rowsData']);
            $file->setLangueOb($data['selectedLang']);

            $fileRep->persist($file);

            $fileRep->flush();

            return $this->json([
                //'id' => "",
                'message' => 'Your file has been imported',
                'status' =>'success',
                'data' => $data
            ],Response::HTTP_OK);
        }else{
            return $this->json([
                'message' => 'Please send the right data with the right http method',
                'status' =>'failed',
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
