<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Loader;

class ResumeStatistiqueController extends Controller
{

    public function storedProcedure($proc_name,$codecyclensei,$codesect){
        $em = $this->getDoctrine()->getManager()->getConnection();
        // $sth = $em->prepare("CALL ".$proc_name."(".$codecyclensei.");");
        if($codesect=="" and $codecyclensei!="")
        {
            $resultat = $em->query("CALL " . $proc_name . "(" . $codecyclensei . ");")->fetchAll();
            //  $sth->execute();
            return $resultat;
        }elseif($codesect!="" and $codecyclensei!="")
        {
            $resultat = $em->query("CALL ".$proc_name."(".$codecyclensei.",'".$codesect."');")->fetchAll();
            return $resultat;
        }elseif($codesect=="" and $codecyclensei=="")
        {
            $resultat = $em->query("CALL ".$proc_name."();")->fetchAll();
            return $resultat;
        }else
        {

        }
    }
    public function listresustatAction(Request $request)
    {
        $entitiesprep=$this->storedProcedure('SP_ResuStat_ResumeStatistiquePrep','3','PU');
        $entitiesevolcyclprim=$this->storedProcedure('SP_ResuStat_EvolutionCyclePrimaire_Etatique','0','PU');
        $entitiesevolclascyclprim=$this->storedProcedure('SP_ResuStat_EvolutionClassCyclePrimaire_EtatiquePrim',"","");
        $entitiesevoltauxscol=$this->storedProcedure('SP_ResuStat_EvolutionTauxScolarisation_Etatique',"","");
        $entitiesevoltauxprom=$this->storedProcedure('SP_ResuStat_EvolutionTauxPromotion_Etatique',"","");
        $entitiesevoltauxredo=$this->storedProcedure('SP_ResuStat_EvolutionTauxRedoublement_Etatique',"","");
        $entitiesevoltauxaban=$this->storedProcedure('SP_ResuStat_EvolutionTauxAbandon_Etatique',"","");
        $entitiesevolcyclprimpriv=$this->storedProcedure('SP_ResuStat_EvolutionCyclePrimaire_Privee','0','PR');
        $entitiesevolcyclprimetat=$this->storedProcedure('SP_ResuStat_EvolutionCyclePrimaire_EtatiquePrim','2','PU');
        $entitiesevoloriepremanne=$this->storedProcedure('SP_ResuStat_EvolutionOrientationPremierAnnee_Etatique',"","");
        $entitiesevoloriedeuxanne=$this->storedProcedure('SP_ResuStat_EvolutionOrientationDeuxiemeAnnee_Etatique',"","");
        $entitiesevoltauxscol1218=$this->storedProcedure('SP_ResuStat_EvolutionTauxScolarisation1218_Etatique',"","");
        $entitiesevoltauxscol616=$this->storedProcedure('SP_ResuStat_EvolutionTauxScolarisation616_Etatique',"","");
        $entitiessecond=$this->storedProcedure('SP_ResuStat_ResumeStatistiquePrep','2','PU');
        $entitiesevoltauxpromsecond=$this->storedProcedure('SP_ResuStat_EvolutionTauxPromotionCyclSeco_Etatique',"","");
        $entitiesevoltauxredosecond=$this->storedProcedure('SP_ResuStat_EvolutionTauxRedoublementCyclSeco_Etatique',"","");
        $entitiesevoltauxabansecond=$this->storedProcedure('SP_ResuStat_EvolutionTauxAbandonCyclSeco_Etatique',"","");
        $entitiesevolcyclsecondpriv=$this->storedProcedure('SP_ResuStat_ResumeStatistiquePrep','2','PR');
        $entitiesevolcycltechpriv=$this->storedProcedure('SP_ResuStat_EvolutionCycleTechnique_Privee','2','PR');

        $arrevoltauxscol616=array();
        $arrannevoltauxscol616=array();
        $arrevoll616=array();
        foreach($entitiesevoltauxscol616 as $key=>$ar)
        {
            $arrannevoltauxscol616[$ar['LibeAnneScolAr']]=$ar['LibeAnneScolAr'];
        }
        foreach($entitiesevoltauxscol616 as $key=>$arr)
        {
            $arrevoll616[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
            $arrevoll616[$arr['TracAge']]['LibeAnneScolAr'] = $arr['LibeAnneScolAr'];
            $arrevoll616[$arr['TracAge']]['ElevMasc'] = $arr['ElevMasc'];
            $arrevoll616[$arr['TracAge']]['ElevFemi'] = $arr['ElevFemi'];
            $arrevoll616[$arr['TracAge']]['TotaElev'] = $arr['TotaElev'];
        }
        foreach($arrevoll616 as $key=>$arr)
        {
            foreach($arrannevoltauxscol616 as $k=>$ar)
            {
                if(in_array ($ar ,$arr))
                {
                    $arrevoltauxscol616[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
                    $arrevoltauxscol616[$arr['TracAge']][$arr['LibeAnneScolAr']] = $arr['LibeAnneScolAr'];
                    $arrevoltauxscol616[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevMasc'] = $arr['ElevMasc'];
                    $arrevoltauxscol616[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevFemi'] = $arr['ElevFemi'];
                    $arrevoltauxscol616[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'TotaElev'] = $arr['TotaElev'];
                }else
                {
                    $arrevoltauxscol616[$arr['TracAge']][$ar] = $ar;
                    $arrevoltauxscol616[$arr['TracAge']][$ar . 'ElevMasc'] = '0';
                    $arrevoltauxscol616[$arr['TracAge']][$ar . 'ElevFemi'] = '0';
                    $arrevoltauxscol616[$arr['TracAge']][$ar . 'TotaElev'] = '0';
                }

            }
        }


        $arrevoltauxscol1218=array();
        $arrannevoltauxscol1218=array();
        $arrevol1218=array();
        foreach($entitiesevoltauxscol1218 as $key=>$ar)
        {
            $arrannevoltauxscol1218[$ar['LibeAnneScolAr']]=$ar['LibeAnneScolAr'];
        }
        foreach($entitiesevoltauxscol1218 as $key=>$arr)
        {
            $arrevol1218[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
            $arrevol1218[$arr['TracAge']]['LibeAnneScolAr'] = $arr['LibeAnneScolAr'];
            $arrevol1218[$arr['TracAge']]['ElevMasc'] = $arr['ElevMasc'];
            $arrevol1218[$arr['TracAge']]['ElevFemi'] = $arr['ElevFemi'];
            $arrevol1218[$arr['TracAge']]['TotaElev'] = $arr['TotaElev'];
        }
        foreach($arrevol1218 as $key=>$arr)
        {
            foreach($arrannevoltauxscol1218 as $k=>$ar)
            {
                if(in_array ($ar ,$arr))
                {
                    $arrevoltauxscol1218[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
                    $arrevoltauxscol1218[$arr['TracAge']][$arr['LibeAnneScolAr']] = $arr['LibeAnneScolAr'];
                    $arrevoltauxscol1218[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevMasc'] = $arr['ElevMasc'];
                    $arrevoltauxscol1218[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevFemi'] = $arr['ElevFemi'];
                    $arrevoltauxscol1218[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'TotaElev'] = $arr['TotaElev'];
                }else
                {
                    $arrevoltauxscol1218[$arr['TracAge']][$ar] = $ar;
                    $arrevoltauxscol1218[$arr['TracAge']][$ar . 'ElevMasc'] = '0';
                    $arrevoltauxscol1218[$arr['TracAge']][$ar . 'ElevFemi'] = '0';
                    $arrevoltauxscol1218[$arr['TracAge']][$ar . 'TotaElev'] = '0';
                }

            }
        }



        $arrevoltauxscol=array();
        $arrannevoltauxscol=array();
        $arrevol=array();
        foreach($entitiesevoltauxscol as $key=>$ar)
        {
            $arrannevoltauxscol[$ar['LibeAnneScolAr']]=$ar['LibeAnneScolAr'];
        }
        foreach($entitiesevoltauxscol as $key=>$arr)
        {
            $arrevol[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
            $arrevol[$arr['TracAge']]['LibeAnneScolAr'] = $arr['LibeAnneScolAr'];
            $arrevol[$arr['TracAge']]['ElevMasc'] = $arr['ElevMasc'];
            $arrevol[$arr['TracAge']]['ElevFemi'] = $arr['ElevFemi'];
            $arrevol[$arr['TracAge']]['TotaElev'] = $arr['TotaElev'];
        }
        //   var_dump($arrevol);die;
        //     $aa='';
//        foreach($arrann as $k=>$ar)
//        {

        foreach($arrevol as $key=>$arr)
        {
            foreach($arrannevoltauxscol as $k=>$ar)
            {
                if(in_array ($ar ,$arr))
                {
                    $arrevoltauxscol[$arr['TracAge']]['TracAge'] = $arr['TracAge'];
                    $arrevoltauxscol[$arr['TracAge']][$arr['LibeAnneScolAr']] = $arr['LibeAnneScolAr'];
                    $arrevoltauxscol[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevMasc'] = $arr['ElevMasc'];
                    $arrevoltauxscol[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'ElevFemi'] = $arr['ElevFemi'];
                    $arrevoltauxscol[$arr['TracAge']][$arr['LibeAnneScolAr'] . 'TotaElev'] = $arr['TotaElev'];
                }else
                {
                    $arrevoltauxscol[$arr['TracAge']][$ar] = $ar;
                    $arrevoltauxscol[$arr['TracAge']][$ar . 'ElevMasc'] = '0';
                    $arrevoltauxscol[$arr['TracAge']][$ar . 'ElevFemi'] = '0';
                    $arrevoltauxscol[$arr['TracAge']][$ar . 'TotaElev'] = '0';
                }

            }
        }

        return $this->render('SiseCoreBundle:ResumeStatistique:listresustat.html.twig', array(
            'entitiesprep' => $entitiesprep,
            'entitiesevolcyclprim' => $entitiesevolcyclprim,
            'entitiesevolclascyclprim' => $entitiesevolclascyclprim,
            'entitiesevoltauxscol' => $arrevoltauxscol,
            'arrannevoltauxscol' => $arrannevoltauxscol,
            'entitiesevoltauxprom' => $entitiesevoltauxprom,
            'entitiesevoltauxredo' => $entitiesevoltauxredo,
            'entitiesevoltauxaban' => $entitiesevoltauxaban,
            'entitiesevolcyclprimpriv' => $entitiesevolcyclprimpriv,
            'entitiesevolcyclprimetat' => $entitiesevolcyclprimetat,
            'entitiesevoloriepremanne' => $entitiesevoloriepremanne,
            'entitiesevoloriedeuxanne' => $entitiesevoloriedeuxanne,
            'entitiesevoltauxscol1218' => $arrevoltauxscol1218,
            'arrannevoltauxscol1218' => $arrannevoltauxscol1218,
            'entitiesevoltauxscol616' => $arrevoltauxscol616,
            'arrannevoltauxscol616' => $arrannevoltauxscol616,
            'entitiessecond' => $entitiessecond,
            'entitiesevoltauxpromsecond' => $entitiesevoltauxpromsecond,
            'entitiesevoltauxredosecond' => $entitiesevoltauxredosecond,
            'entitiesevoltauxabansecond' => $entitiesevoltauxabansecond,
            'entitiesevolcyclsecondpriv' => $entitiesevolcyclsecondpriv,
            'entitiesevolcycltechpriv' => $entitiesevolcycltechpriv,
        ));
    }
}
