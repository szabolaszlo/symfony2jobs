<?php

namespace Jobz\CoreBundle\Controller;

use Jobz\CoreBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class JobController extends Controller
{
    const JOB_LIMIT = 10;

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $jobsEnt = $this->getJobs($request);

        $categories = array();

        /** @var Job $job */
        foreach ((array)$jobsEnt as $job) {
            $jobs[$job->getCategory()->getId()][] = $job;
            $categories[$job->getCategory()->getId()] = $job->getCategory();
        }

        return $this->render('CoreBundle:Job:index.html.twig', array(
            'categories' => $categories,
            'jobs' => $jobs
        ));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function getJobs(Request $request)
    {
        $keyword = $request->get('keywords');

        if ($keyword) {
            return $this->getJobsByKeyword($keyword);
        }

        return $this->getLatestJobs();
    }

    /**
     * @param $keyword
     * @return mixed
     */
    protected function getJobsByKeyword($keyword)
    {
        return $this
            ->getDoctrine()
            ->getRepository('CoreBundle:Job')
            ->findByKeyword($keyword);
    }

    /**
     * @param $keyword
     * @return mixed
     */
    protected function getLatestJobs()
    {
        return $this
            ->getDoctrine()
            ->getRepository('CoreBundle:Job')
            ->findBy(array(), array('createdAt' => 'DESC'), self::JOB_LIMIT);
    }

    /**
     * @Route("/job/{id}")
     */
    public function showAction(Job $job)
    {
        return $this->render('CoreBundle:Job:show.html.twig', array(
            'job' => $job
        ));
    }
}
