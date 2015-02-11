<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 10/02/2015
 * Time: 17:35
 */

namespace Sise\Bundle\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SiseCommand extends Command
{

    protected function InitProcedure($proc_name,$annescol, $coderece){
        $em = $this->getDoctrine()->getManager()->getConnection();
        $sth = $em->prepare("CALL ".$proc_name."(".$annescol.",'".$coderece."');");
        $sth->execute();
        return true;
    }
    protected function configure()
    {
        $this
            ->setName('procedure:sise')
            ->setDescription('Greet someone')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $this->InitProcedure('SP_Init_Questionnaire',$entity->getRece()->getAnnescol(),$entity->getRece()->getCoderece());

        $output->writeln($text);
    }
}