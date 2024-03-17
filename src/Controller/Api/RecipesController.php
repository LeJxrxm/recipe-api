<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class RecipesController extends AppController {

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $this->Authentication->allowUnauthenticated(['index', 'view']);
    }

    // G E T
    public function index(){
        $recipes = $this->Recipes->find()->where(['Recipes.is_active' => true])
            ->contain([
                'RecipeIngredients' => function($q){
                    return $q;
                },
                'RecipeSteps' => function($q){
                    return $q;//->select(['id', 'recipe_id', 'description', 'image']);
                }
            ])
            ->orderBy(['created' => 'DESC']);
        return $this->json($recipes->toArray());
    }


    // G E T
    public function view($id){
        $recipe = $this->Recipes->findById($id);
        return $this->json($recipe->toArray());
    }

    // P O S T
    public function add(){
        $recipe = $this->Recipes->newEmptyEntity();
        if($this->request->is('post')){
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if($this->Recipes->save($recipe)){
                $message = 'Saved';
            }else{
                $message = 'Error';
            }
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    // P U T  /  P A T C H
    public function edit($id){
        $recipe = $this->Recipes->get($id);
        if($this->request->is(['post', 'put'])){
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if($this->Recipes->save($recipe)){
                $message = 'Saved';
            }else{
                $message = 'Error';
            }
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
