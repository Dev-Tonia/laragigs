<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return  [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 3,
                'title' => 'Listing Three',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
            [
                'id' => 4,
                'title' => 'Listing Four',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias accusantium vero voluptates quisquam corporis, modi esse dolorum nostrum aliquid vitae, ad necessitatibus porro magni! Dolores eius ab, autem rerum laudantium voluptatibus blanditiis neque saepe quasi quis eum ducimus provident fugiat exercitationem optio ipsum nostrum molestias quas quia eaque aperiam repellat! Sit debitis, iure quo doloribus maxime fugit dolore sunt ex nostrum obcaecati. Quae doloremque exercitationem, odit est voluptate tempore deserunt explicabo in ipsum, quasi maxime non reiciendis provident unde, assumenda amet numquam dolor. Tempora est velit soluta itaque, doloremque laudantium cum debitis explicabo natus tenetur tempore sunt porro corporis nostrum!'
            ],
        ];
    }


    // this is how to create modal function that will get only a single element from the list
    public static function find($id)
    {
        $listings = self::all(); //the self is used to call the function all that was delcared in the same class

        foreach ($listings as $listing) {
            if ($listing['id'] === $id) {
                return $listing;
            }
        }
    }
}
