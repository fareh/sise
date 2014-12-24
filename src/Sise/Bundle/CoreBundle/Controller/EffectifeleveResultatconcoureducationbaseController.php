<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/12/2014
 * Time: 15:27
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveResultatconcoureducationbase;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveResultatconcoureducationbase controller.
 *
 */
class EffectifeleveResultatconcoureducationbaseController extends Controller
{

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectifeleveresultatconcoureducationbase_edit');
        $pathUpdate = $this->generateUrl('effectifeleveresultatconcoureducationbase_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResultatconcoureducationbase')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_resultatconcoureducationbase');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_resultatconcoureducationbase.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifeleveresultatconcoureducationbase_edit');
        $pathUpdate = $this->generateUrl('effectifeleveresultatconcoureducationbase_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResultatconcoureducationbase')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectifeleveResultatconcoureducationbase')->findOneBy($items);
                $nombelevinscmasc = $request->request->get('nombelevinscmasc' . $i);
                $nombelevinscfemi = $request->request->get('nombelevinscfemi' . $i);
                $nombtotainscelev = $nombelevinscfemi+$nombelevinscmasc;
                $nombelevreusmasc = $request->request->get('nombelevreusmasc' . $i);
                $nombelevreusfemi = $request->request->get('nombelevreusfemi' . $i);
                $nombtotareuselev = $nombelevreusmasc+$nombelevreusfemi;


                $item->setNombelevinscmasc($nombelevinscmasc);
                $item->setNombelevinscfemi($nombelevinscfemi);
                $item->setNombtotainscelev($nombtotainscelev);


                $item->setNombelevreusmasc($nombelevreusmasc);
                $item->setNombelevreusfemi($nombelevreusfemi);
                $item->setNombtotareuselev($nombtotareuselev);



                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectifeleveresultatconcoureducationbase_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_resultatconcoureducationbase');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_resultatconcoureducationbase.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifeleveresultatconcoureducationbase_list');
        $session = $request->getSession();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveResultatconcoureducationbase')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_resultatconcoureducationbase');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_resultatconcoureducationbase.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 