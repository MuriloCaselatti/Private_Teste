<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Receita;

class ReceitaSeeder extends Seeder
{
    public function run()
    {
        Receita::create([
            'title' => 'Bolo de Cenoura',
            'description' => 'Um bolo fofinho de cenoura com cobertura de chocolate.',
            'ingredients' => '2 cenouras médias, 3 ovos, 1 xícara de óleo, 2 xícaras de açúcar, 2 xícaras de farinha de trigo, 1 colher de sopa de fermento em pó, 1/2 xícara de chocolate em pó, 1 xícara de leite',
            'steps' => '1. Bata as cenouras, ovos e óleo no liquidificador até obter uma mistura homogênea. 2. Em uma tigela, misture a farinha de trigo, o açúcar e o fermento. 3. Adicione a mistura do liquidificador aos ingredientes secos e misture bem. 4. Despeje em uma forma untada e leve ao forno pré-aquecido a 180°C por cerca de 40 minutos.',
            'user_id' => 1 // Substitua com o ID do usuário criado
        ]);

        Receita::create([
            'title' => 'Bolo de Chocolate',
            'description' => 'Bolo úmido e delicioso com bastante chocolate.',
            'ingredients' => '3 ovos, 1 xícara de leite, 1/2 xícara de óleo, 2 xícaras de açúcar, 1 xícara de chocolate em pó, 2 xícaras de farinha de trigo, 1 colher de sopa de fermento em pó',
            'steps' => '1. Em uma tigela, bata os ovos, o leite e o óleo. 2. Adicione o açúcar, o chocolate em pó e misture bem. 3. Aos poucos, adicione a farinha de trigo e o fermento, mexendo até a massa ficar homogênea. 4. Despeje em uma forma untada e leve ao forno pré-aquecido a 180°C por cerca de 35 minutos.',
            'user_id' => 1 // Substitua com o ID do usuário criado
        ]);

        Receita::create([
            'title' => 'Bolo de Laranja',
            'description' => 'Bolo cítrico e aromático, perfeito para acompanhar um café da tarde.',
            'ingredients' => '2 laranjas, 3 ovos, 1 xícara de óleo, 2 xícaras de açúcar, 2 xícaras de farinha de trigo, 1 colher de sopa de fermento em pó',
            'steps' => '1. Descasque as laranjas e retire as sementes. Bata as laranjas, ovos e óleo no liquidificador até obter uma mistura homogênea. 2. Em uma tigela, misture a farinha de trigo, o açúcar e o fermento. 3. Adicione a mistura do liquidificador aos ingredientes secos e misture bem. 4. Despeje em uma forma untada e leve ao forno pré-aquecido a 180°C por cerca de 40 minutos.',
            'user_id' => 1 // Substitua com o ID do usuário criado
        ]);
    }
}
