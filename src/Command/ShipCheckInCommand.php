<?php

namespace App\Command;

use App\Repository\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
	name: 'app:ship:check-in',
	description: 'Check-in ship',
)]
class ShipCheckInCommand extends Command {
	public function __construct(
		private StarshipRepository $shipRepo,
		private EntityManagerInterface $em
	) {
		parent::__construct();
	}

	protected function configure(): void {
		$this
			->addArgument('slug', InputArgument::REQUIRED, 'The slug of the starship');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$io = new SymfonyStyle($input, $output);
		$arg1 = $input->getArgument('arg1');

		if ($arg1) {
			$io->note(sprintf('You passed an argument: %s', $arg1));
		}

		if ($input->getOption('option1')) {
			// ...
		}

		$io->success('You have a new command! Now make it your own! Pass --help to see your options.');

		return Command::SUCCESS;
	}
}
