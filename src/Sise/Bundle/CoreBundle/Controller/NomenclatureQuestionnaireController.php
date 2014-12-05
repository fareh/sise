<?php

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnaire;
use Sise\Bundle\CoreBundle\Form\NomenclatureQuestionnaireType;
use Sise\Bundle\CoreBundle\Form\search\SearchType;
use Sise\Bundle\CoreBundle\Form\EffectifeleveDemiresidantType;
use Sise\Bundle\CoreBundle\Form\EffectifeleveDemiresidantCollectionType;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveDemiresidant;


/**
 * NomenclatureQuestionnaire controller.
 *
 */
class NomenclatureQuestionnaireController extends Controller
{

    /**
     * Lists all NomenclatureQuestionnaire entities.
     *
     */
    public function statEleveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findByCodepack("StatElev");
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:statEleve.html.twig', array(
            'entities' => $entities,
            'search' => $search->createView(),
            'pathfilter' => 'statEleve'
        ));
    }


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction($table, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $entity = $em->getRepository('SiseCoreBundle:CoreProject')->findOneByTableName($table);
        $editForms = array();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
        }
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('StatEleve_edit', array('table' => $table));

        if ($request->isMethod('POST')) {
            if ($table == "effectifeleve_demiresidan") {
                $params = $request->request->get($search->getName());
                $session->set("features", $params);

                $entities = $em->getRepository($entity->getEntity())->findBy(array('codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));

                foreach ($entities as $item) {

                    $editForms[] = $this->createCustomForm($item)->createView();

                }

                $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));

            } elseif ($table == "effectifeleve_elevedomainsousdomain") {

                $params = $request->request->get($search->getName());
                $session->set("features", $params);

                $entities = $em->getRepository($entity->getEntity())->findBy(array('codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));


                $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));
            } elseif ($table == "effectiveeleve_niveauscolaire_anneenaissance") {

                $params = $request->request->get($search->getName());
                $session->set("features", $params);
                $codeannenais = array();
                $codenivescol = array();
                $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));
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
                    ->setParameter('CodeEtab', $params['NomenclatureEtablissement'])
                    ->setParameter('CodeTypeEtab', $params['NomenclatureTypeetablissement'])
                    ->setParameter('AnneScol', 2014)
                    ->setParameter('CodeRece', '16Oct');
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
                return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.' . $table . '.html.twig', array(
                    'editForms' => $editForms,
                    'features' => @$features,
                    'search' => $search->createView(),
                    'pathfilter' => $url,
                    'pathUpdate' => @$pathUpdate,
                    'html' => $html
                ));

            }


        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.' . $table . '.html.twig', array(
            'entities' => @$entities,
            'editForms' => $editForms,
            'features' => @$features,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'html' => @$html
        ));
    }


    public function getDistinct($tabs, $columName)
    {

        foreach ($tabs as $tab) {


        }


    }

    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $table, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $entity = $em->getRepository('SiseCoreBundle:CoreProject')->findOneByTableName($table);
        $editForms = array();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
        }
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('StatEleve_edit', array('table' => $table));
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $entities = $em->getRepository($entity->getEntity())->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            if ($table == "effectifeleve_demiresidan") {
                for ($i = 0; $i < count($entities); $i++) {
                    $items = array_combine(explode("_", $request->request->get('key_' . $i)), explode("_", $request->request->get('val_' . $i)));
                    $item = $em->getRepository($entity->getEntity())->findOneBy($items);
                    $item->setNombelevresimasc($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevresimasc_' . $i));
                    $item->setNombelevresifemi($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevresifemi_' . $i));
                    $item->setNombtotaresielev($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombtotaresielev_' . $i));
                    $item->setNombelevbourfemi($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombelevbourfemi_' . $i));
                    $item->setNombtotabourelev($request->request->get('sise_bundle_corebundle_effectifelevedemiresidant_nombtotabourelev_' . $i));
                    $em->persist($item);

                    $em->flush();
                }
            } elseif ($table == "effectifeleve_elevedomainsousdomain") {
                for ($i = 0; $i < count($entities); $i++) {
                    $items = array_combine(explode("_", $request->request->get('key_' . $i)), explode("_", $request->request->get('val_' . $i)));

                    $item = $em->getRepository($entity->getEntity())->findOneBy($items);

                    if (!$item) {
                        throw $this->createNotFoundException('Unable to find SiseCoreBundle entity.');
                    }
                    $subdomains = $item->getCodedoma()->getCodesousdoma();
                    $item->setNombclass($request->request->get('nombclass' . $i));
                    $item->setNombelevmasc($request->request->get('nombelevmasc' . $i));
                    $item->setNombelevfemi($request->request->get('nombelevfemi' . $i));
                    $item->setNombtotaelev($request->request->get('nombtotaelev' . $i));
                    $em->persist($item);
                    foreach ($subdomains as $subdomain) {
                        $subdomain->setOrdraffi($request->request->get('codesousdoma_ordraffi_' . $subdomain->getCodesousdoma() . '_' . $i));
                        $em->persist($subdomain);
                    }

                    $em->flush();
                }


            } elseif ($table == "effectiveeleve_niveauscolaire_anneenaissance") {

                $params = $request->request->get($search->getName());
                $session->set("features", $params);
                $codeannenais = array();
                $codenivescol = array();
                $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
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
                    ->setParameter('AnneScol', 2014)
                    ->setParameter('CodeRece', '16Oct');
                $items = $query->getResult();


                foreach ($items as $item) {
                    if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance')) {
                        $nf = $request->request->get($item->getCodenivescol() . '_F_' . $item->getCodeannenais());


                        $nm = $request->request->get($item->getCodenivescol() . '_M_' . $item->getCodeannenais());



                        $item->setNombelevmasc($nm);
                        $item->setNombelevfemi($nf);
                       // echo (int) $nm + (int)$nf ;
                        $item->setNombtotaelev((int) $nm + (int)$nf);
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
                    ->setParameter('AnneScol', 2014)
                    ->setParameter('CodeRece', '16Oct');
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
                            $html .= "<td><input style='width:35px' value='".$ValueItem->getNombelevmasc()."' id='".$codeniv->getCodenivescol() . '_M_' . $key1 . "'  name='" . $codeniv->getCodenivescol() . '_M_' . $key1 . "'  ></td>";
                            $html .= "<td><input style='width:35px' value='".$ValueItem->getNombelevfemi()."' id='".$codeniv->getCodenivescol() . '_F_' . $key1 . "'  name='" . $codeniv->getCodenivescol() . '_F_' . $key1 . "' ></td>";
                            $html .= "<td><span >" . $ValueItem->getNombtotaelev() . "</span></td>";
                        }

                    }


                    $html .= "</tr>";

                }
                $html .= "</tbody></table>";
                $html .= '<input type="submit" value="Envoyer">';
                $html .= '</form>';
                return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.' . $table . '.html.twig', array(
                    'editForms' => $editForms,
                    'features' => @$features,
                    'search' => $search->createView(),
                    'pathfilter' => $url,
                    'pathUpdate' => @$pathUpdate,
                    'html' => $html
                ));

            }
            return $this->redirect($this->generateUrl('StatEleve_edit', array('table' => $table)));
        }


        $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));


        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.' . $table . '.html.twig', array(
            'entities' => @$entities,
            'editForms' => $editForms,
            'features' => @$features,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate
        ));
    }


    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listStatAction($table, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $entity = $em->getRepository('SiseCoreBundle:CoreProject')->findOneByTableName($table);
        $editForms = array();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $url = $this->generateUrl('StatEleve_listStat', array('table' => $table));
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository($entity->getEntity())->findBy(array('codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));

            if ($table == "effectiveeleve_niveauscolaire_anneenaissance") {

                $params = $request->request->get($search->getName());
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
                    ->setParameter('CodeEtab', $params['NomenclatureEtablissement'])
                    ->setParameter('CodeTypeEtab', $params['NomenclatureTypeetablissement'])
                    ->setParameter('AnneScol', 2014)
                    ->setParameter('CodeRece', '16Oct');
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

                $pathUpdate = $this->generateUrl('StatEleve_update', array('table' => $table, 'codeetab' => $params['NomenclatureEtablissement'], 'codetypeetab' => $params['NomenclatureTypeetablissement']));

                return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.' . $table . '.html.twig', array(
                    'search' => $search->createView(),
                    'pathfilter' => $url,
                    'pathUpdate' => @$pathUpdate,
                    'html' => $html
                ));

            }


        }
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.' . $table . '.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url
        ));
    }


    /**
     * Creates a form to edit a NomenclatureQuestionnaire entity.
     *
     * @param NomenclatureQuestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCustomForm(EffectifeleveDemiresidant $entity)
    {
        $form = $this->createForm(new EffectifeleveDemiresidantType(), $entity, array(
            'action' => '',
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }


    /**
     * Creates a new NomenclatureQuestionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NomenclatureQuestionnaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('StatEleve_show', array('id' => $entity->getId())));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NomenclatureQuestionnaire entity.
     *
     * @param NomenclatureQuestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NomenclatureQuestionnaire $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('StatEleve_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NomenclatureQuestionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new NomenclatureQuestionnaire();
        $form = $this->createCreateForm($entity);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NomenclatureQuestionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a form to edit a NomenclatureQuestionnaire entity.
     *
     * @param NomenclatureQuestionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(NomenclatureQuestionnaire $entity)
    {
        $form = $this->createForm(new NomenclatureQuestionnaireType(), $entity, array(
            'action' => $this->generateUrl('StatEleve_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction111(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('StatEleve_edit', array('id' => $id)));
        }

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NomenclatureQuestionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NomenclatureQuestionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('StatEleve'));
    }

    /**
     * Creates a form to delete a NomenclatureQuestionnaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('StatEleve_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
