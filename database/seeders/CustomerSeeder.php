<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
use Faker\Provider\pt_BR\Person as PersonProvider;
use Faker\Provider\pt_BR\Address as AddressProvider;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{

  /**
  * Run the database seeds.
  */
  public function run(): void
    {
      $faker = new \Faker\Generator();
      $faker->addProvider(new PersonProvider($faker));
      $faker->addProvider(new AddressProvider($faker));

      for ($i = 1; $i <= 20; $i++) {
        Customer::create([
          'cpf' =>  $faker->cpf(false),
          'name' =>  $faker->name(),
          'genere' =>  $faker->randomElement(['male', 'female']),
          'dateofbirth' => '1990-01-01',
          'postalcode' => $faker->postcode,
          'street' => $faker->streetName,
          'number' => $faker->buildingNumber,
          'neighborhood' => $faker->citySuffix,
          'city' => $faker->city,
          'state' => $faker->stateAbbr()
        ]);
      }
    }
}
