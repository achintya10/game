<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class startGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'startGame';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
		$playersA = $this->ask('Enter A Teams players:');
		$playersB = $this->ask('Enter B Teams players:');
		//$this->info($playersA);
		
		$arrayA = explode(',',$playersA,5);
		$arrayB = explode(',',$playersB,5);
		$new_arrayA = array();
		
		//$collection = collect($arrayA);
		
		$new_arrayA = Arr::sortRecursive($arrayA);
		$newarray = array();
		//$this->info($new_arrayA->values()->all());
		//$this->info($new_arrayA[0]);
		//$this->info($new_arrayA[1]);
		//$this->info($new_arrayA[2]);
		//$this->info($new_arrayA[3]);
		//$this->info($new_arrayA[4]);
		
		//$collection = [5, 3, 1, 2, 4];
		//$sorted = Arr::sortRecursive($collection);
		
		for($c=0;$c<5;$c++)
		{
			for($n=0;$n<5;$n++)
			{
								
				if($arrayB[$c] < $new_arrayA[$n])
				{
					if(!in_array($new_arrayA[$n],$newarray))
					{
						//$newarray[] = $new_arrayA[$n];
						$temp = $new_arrayA[$c];
						$new_arrayA[$c] = $new_arrayA[$n];
						$new_arrayA[$n] = $temp;
						break;
					}
				}
			}
			
		}
		
		//$this->info('Display this on the screen');
		
		$winA = 'Lose';
		$wincounter = 0;
		for($i=0;$i<5;$i++)
		{
			if($new_arrayA[$i] > $arrayB[$i])
			{
				//$winA = 'Win';
				$wincounter +=1;
			}
		}
		
		if($wincounter==5)
		{
			$winA = 'Win';
			
		}
		else
		{
			$winA = 'Lose';
		}
		$this->info($winA);
        //return Command::SUCCESS;
    }
}
