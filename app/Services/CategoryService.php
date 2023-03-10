<?php

namespace App\Services;

use App\Models\CategoryModel;
use CodeIgniter\Config\Factories;

class CategoryService
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = Factories::models(CategoryModel::class);
    }

    public function getAllCategories() : array
    {

        $categories = $this->categoryModel->asObject()->orderBy('id', 'DESC')->findAll();

        $data = [];

        foreach($categories as $category) {

            $btnEdit = form_button(
                [
                    'data-id' => $category->id,
                    'id'      => 'updateCategoryBtn', // ID do html element
                    'class'   => 'btn btn-success btn-sm',
                ],
                'Editar'
            );

            $btnArchive = form_button(
                [
                    'data-id' => $category->id,
                    'id'      => 'archiveCategoryBtn', // ID do html element
                    'class'   => 'btn btn-warning btn-sm',
                ],
                'Arquivar'
            );

            $data[] = [
                'id'       => $category->id,
                'name'     => $category->name,
                'slug'     => $category->slug,
                'actions'  => '<span style="float:right;">'.$btnEdit.' '.$btnArchive.'</span>',
            ];
        }

        return $data;
    }
}