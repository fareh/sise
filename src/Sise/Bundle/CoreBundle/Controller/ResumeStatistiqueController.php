<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Loader;

class ResumeStatistiqueController extends Controller
{
    public function storedProcedure($proc_name,$codecyclensei){
        $em = $this->getDoctrine()->getManager()->getConnection();
       // $sth = $em->prepare("CALL ".$proc_name."(".$codecyclensei.");");
        $resultat = $em->query("CALL ".$proc_name."(".$codecyclensei.");")->fetchAll();
      //  $sth->execute();
        return $resultat;
    }
    public function listresustatAction(Request $request)
    {
        $entities=$this->storedProcedure('SP_ResuStat_ResumeStatistiquePrep','0');
       // var_dump($tab);die;
        return $this->render('SiseCoreBundle:ResumeStatistique:listresustat.html.twig', array('entities' => $entities));
    }
}
