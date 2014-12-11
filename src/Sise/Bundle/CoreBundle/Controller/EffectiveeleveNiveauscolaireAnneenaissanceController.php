<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/12/2014
 * Time: 16:05
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectiveeleveNiveauscolaireAnneenaissance controller.
 *
 */
class EffectiveeleveNiveauscolaireAnneenaissanceController  extends Controller
{


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction( Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevedemiresidant_edit');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $codeannenais = array();
            $codenivescol = array();
            $html = '<form action="' . $pathUpdate . '" method="post"  class="well form-search">';
            $html .= "  <table cellspacing='0' rules='all' border='1' id='CPHMain_GridView_Edit' style='width:100%;border-collapse:collapse;'><thead>";
            $query = $em->createQuery(
                'SELECT   P , F1 , F2 , F3
                     FROM SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance P
                       INNER JOIN  SiseCoreBundle:NomenclatureEtablissement F1 WITH  P.codeetab=F1.codeetab and P.codetypeetab=F1.codetypeetab
                       INNER JOIN SiseCoreBundle:NomenclatureAnneenaissance   F2 WITH  P.codeannenais=F2.codeannenais
                       INNER JOIN  SiseCoreBundle:NomenclatureNiveauscolaire  F3 WITH  P.codenivescol=F3.codenivescol
         WHERE
                    P.codeetab = :CodeEtab
                    and P.codetypeetab = :CodeTypeEtab
                    and P.annescol = :AnneScol and P.coderece = :CodeRece
                         Order by  F2.ordraffi  asc
                    '
            )
                ->setParameter('CodeEtab', $codeetab)
                ->setParameter('CodeTypeEtab', $codetypeetab)
                ->setParameter('AnneScol', $annescol)
                ->setParameter('CodeRece', $coderece);
            $items = $query->getResult();


            foreach ($items as $item) {
                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance')) {
                    $EffectiveeleveNiveauscolaireAnneenaissance[$item->getCodenivescol()][$item->getCodeannenais()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire')) {
                    $codenivescol[$item->getOrdraffi()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance')) {
                    $codeannenais[$item->getCodeannenais()] = $item->getLibeannenaisar();

                }
            }

            $html .= "<tr><th></th>";
            foreach ($codeannenais as $key => $codeannenai) {

                $html .= "<th colspan='3'>" . $codeannenai . "</th>";


            }
            $html .= "</tr>";

            $html .= "<tr> <th align ='center' scope = 'col' style = 'color:White;background-color:#4F81BD;' >
 المستوى الدراسي </th >";

            foreach ($codeannenais as $key => $codeannenai) {

                $html .=
                    '
                         <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > الجملة</th >
 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > ذكر</th >
 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > أنثى</th >';


            }
            $html .= "</tr></thead>";

            $html .= "<tbody>";
            ksort($codenivescol);
            foreach ($codenivescol as $key => $codeniv) {

                $html .= "<tr><td>" . $codeniv->getLibenivescolar() . "</td>";
                foreach ($codeannenais as $key1 => $codeannenai) {

                    $ValueItem = @$EffectiveeleveNiveauscolaireAnneenaissance[$codeniv->getCodenivescol()][$key1];
                    if ($ValueItem === null) {
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                    } else {
                        $html .= "<td><input style='width:35px' value='" . $ValueItem->getNombelevmasc() . "' id='" . $codeniv->getCodenivescol() . '_M_' . $key1 . "' ></td>";
                        $html .= "<td><input style='width:35px' value='" . $ValueItem->getNombelevfemi() . "' id='" . $codeniv->getCodenivescol() . '_F_' . $key1 . "' ></td>";
                        $html .= "<td><span >" . $ValueItem->getNombtotaelev() . "</span></td>";
                    }

                }


                $html .= "</tr>";

            }
            $html .= "</tbody></table>";
            $html .= '<input type="submit" value="Envoyer">';
            $html .= '</form>';
            return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
                'search' => $search->createView(),
                'pathfilter' => $url,
                'pathUpdate' => @$pathUpdate,
                'html' => $html
            ));


        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_edit');
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $codeannenais = array();
            $codenivescol = array();
            $html = '<form action="' . $pathUpdate . '" method="post"  class="well form-search">';
            $html .= "  <table cellspacing='0' rules='all' border='1' id='CPHMain_GridView_Edit' style='width:100%;border-collapse:collapse;'><thead>";
            $query = $em->createQuery(
                'SELECT   P , F1 , F2 , F3
                     FROM SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance P
                       INNER JOIN  SiseCoreBundle:NomenclatureEtablissement F1 WITH  P.codeetab=F1.codeetab and P.codetypeetab=F1.codetypeetab
                       INNER JOIN SiseCoreBundle:NomenclatureAnneenaissance   F2 WITH  P.codeannenais=F2.codeannenais
                       INNER JOIN  SiseCoreBundle:NomenclatureNiveauscolaire  F3 WITH  P.codenivescol=F3.codenivescol
         WHERE
                    P.codeetab = :CodeEtab
                    and P.codetypeetab = :CodeTypeEtab
                    and P.annescol = :AnneScol and P.coderece = :CodeRece
                         Order by  F2.ordraffi  asc
                    '
            )
                ->setParameter('CodeEtab', $codeetab)
                ->setParameter('CodeTypeEtab', $codetypeetab)
                ->setParameter('AnneScol', $annescol)
                ->setParameter('CodeRece', $coderece);
            $items = $query->getResult();


            foreach ($items as $item) {
                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance')) {
                    $nf = $request->request->get($item->getCodenivescol() . '_F_' . $item->getCodeannenais());


                    $nm = $request->request->get($item->getCodenivescol() . '_M_' . $item->getCodeannenais());


                    $item->setNombelevmasc($nm);
                    $item->setNombelevfemi($nf);
                    // echo (int) $nm + (int)$nf ;
                    $item->setNombtotaelev((int)$nm + (int)$nf);
                    $em->persist($item);

                }
            }
            $em->flush();

            $query = $em->createQuery(
                'SELECT   P , F1 , F2 , F3
                     FROM SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance P
                       INNER JOIN  SiseCoreBundle:NomenclatureEtablissement F1 WITH  P.codeetab=F1.codeetab and P.codetypeetab=F1.codetypeetab
                       INNER JOIN SiseCoreBundle:NomenclatureAnneenaissance   F2 WITH  P.codeannenais=F2.codeannenais
                       INNER JOIN  SiseCoreBundle:NomenclatureNiveauscolaire  F3 WITH  P.codenivescol=F3.codenivescol
         WHERE
                    P.codeetab = :CodeEtab
                    and P.codetypeetab = :CodeTypeEtab
                    and P.annescol = :AnneScol and P.coderece = :CodeRece
                         Order by  F2.ordraffi  asc
                    '
            )
                ->setParameter('CodeEtab', $codeetab)
                ->setParameter('CodeTypeEtab', $codetypeetab)
                ->setParameter('AnneScol', $annescol)
                ->setParameter('CodeRece', $coderece);
            $items = $query->getResult();

            foreach ($items as $item) {
                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance')) {
                    $EffectiveeleveNiveauscolaireAnneenaissance[$item->getCodenivescol()][$item->getCodeannenais()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire')) {
                    $codenivescol[$item->getOrdraffi()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance')) {
                    $codeannenais[$item->getCodeannenais()] = $item->getLibeannenaisar();

                }
            }

            $html .= "<tr><th></th>";
            foreach ($codeannenais as $key => $codeannenai) {

                $html .= "<th colspan='3'>" . $codeannenai . "</th>";


            }
            $html .= "</tr>";

            $html .= "<tr> <th align ='center' scope = 'col' style = 'color:White;background-color:#4F81BD;' >
 المستوى الدراسي </th >";

            foreach ($codeannenais as $key => $codeannenai) {

                $html .=
                    '

 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > ذكر</th >
 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > أنثى</th >
   <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > الجملة</th >
   ';


            }
            $html .= "</tr></thead>";

            $html .= "<tbody>";
            ksort($codenivescol);
            foreach ($codenivescol as $key => $codeniv) {

                $html .= "<tr><td>" . $codeniv->getLibenivescolar() . "</td>";
                foreach ($codeannenais as $key1 => $codeannenai) {

                    $ValueItem = @$EffectiveeleveNiveauscolaireAnneenaissance[$codeniv->getCodenivescol()][$key1];
                    if ($ValueItem === null) {
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                    } else {
                        $html .= "<td><input style='width:35px' value='" . $ValueItem->getNombelevmasc() . "' id='" . $codeniv->getCodenivescol() . '_M_' . $key1 . "'  name='" . $codeniv->getCodenivescol() . '_M_' . $key1 . "'  ></td>";
                        $html .= "<td><input style='width:35px' value='" . $ValueItem->getNombelevfemi() . "' id='" . $codeniv->getCodenivescol() . '_F_' . $key1 . "'  name='" . $codeniv->getCodenivescol() . '_F_' . $key1 . "' ></td>";
                        $html .= "<td><span >" . $ValueItem->getNombtotaelev() . "</span></td>";
                    }

                }


                $html .= "</tr>";

            }
            $html .= "</tbody></table>";
            $html .= '<input type="submit" value="Envoyer">';
            $html .= '</form>';
            return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
                'search' => $search->createView(),
                'pathfilter' => $url,
                'pathUpdate' => @$pathUpdate,
                'html' => $html
            ));

        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'html' => @$html
        ));
    }


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_list');
        $session = $request->getSession();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $codeannenais = array();
            $codenivescol = array();
            $html = "  <table cellspacing='0' rules='all' border='1' id='CPHMain_GridView_Edit' style='width:100%;border-collapse:collapse;'><thead>";
            $query = $em->createQuery(
                'SELECT   P , F1 , F2 , F3
                     FROM SiseCoreBundle:EffectiveeleveNiveauscolaireAnneenaissance P
                       INNER JOIN  SiseCoreBundle:NomenclatureEtablissement F1 WITH  P.codeetab=F1.codeetab and P.codetypeetab=F1.codetypeetab
                       INNER JOIN SiseCoreBundle:NomenclatureAnneenaissance   F2 WITH  P.codeannenais=F2.codeannenais
                       INNER JOIN  SiseCoreBundle:NomenclatureNiveauscolaire  F3 WITH  P.codenivescol=F3.codenivescol
         WHERE
                    P.codeetab = :CodeEtab
                    and P.codetypeetab = :CodeTypeEtab
                    and P.annescol = :AnneScol and P.coderece = :CodeRece
                         Order by  F2.ordraffi  asc
                    '
            )
                ->setParameter('CodeEtab', $codeetab)
                ->setParameter('CodeTypeEtab', $codetypeetab)
                ->setParameter('AnneScol', $annescol)
                ->setParameter('CodeRece', $coderece);
            $items = $query->getResult();

            foreach ($items as $item) {
                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance')) {
                    $EffectiveeleveNiveauscolaireAnneenaissance[$item->getCodenivescol()][$item->getCodeannenais()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire')) {
                    $codenivescol[$item->getOrdraffi()] = $item;
                }


                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance')) {
                    $codeannenais[$item->getCodeannenais()] = $item->getLibeannenaisar();

                }
            }


            $html .= "<tr><th></th>";


            foreach ($codeannenais as $key => $codeannenai) {

                $html .= "<th colspan='3'>" . $codeannenai . "</th>";


            }
            $html .= "</tr>";


            $html .= "<tr> <th align ='center' scope = 'col' style = 'color:White;background-color:#4F81BD;' >
 المستوى الدراسي </th >";


            foreach ($codeannenais as $key => $codeannenai) {


                $html .=
                    '
                                         <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > الجملة</th >
                 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > ذكر</th >
                 <th align = "center" scope = "col" style = "color:White;background-color:#92B3CF;" > أنثى</th >';


            }
            $html .= "</tr></thead>";

            $html .= "<tbody>";
            ksort($codenivescol);
            foreach ($codenivescol as $key => $codeniv) {

                $html .= "<tr><td>" . $codeniv->getLibenivescolar() . "</td>";
                foreach ($codeannenais as $key1 => $codeannenai) {

                    $ValueItem = @$EffectiveeleveNiveauscolaireAnneenaissance[$codeniv->getCodenivescol()][$key1];
                    if ($ValueItem === null) {
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                        $html .= "<td></td>";
                    } else {
                        $html .= "<td>" . $ValueItem->getNombelevmasc() . "</td>";
                        $html .= "<td>" . $ValueItem->getNombelevfemi() . "</td>";
                        $html .= "<td><span >" . $ValueItem->getNombtotaelev() . "</span></td>";
                    }

                }


                $html .= "</tr>";

            }


            $html .= "</tbody></table>";

            $pathUpdate = $this->generateUrl('effectiveeleveniveauscolaireanneenaissance_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

            return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
                'search' => $search->createView(),
                'pathfilter' => $url,
                'pathUpdate' => @$pathUpdate,
                'html' => $html
            ));
        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectiveeleve_niveauscolaire_anneenaissance.html.twig', array(
            'search' => $search->createView(),
            'pathfilter' => $url
        ));
    }
} 