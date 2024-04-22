<?php

use Lesson01\hw01\PairTag;
use Lesson01\hw01\SingleTag;
use Lesson01\hw01\TextNode;

require_once __DIR__ . '/../../../vendor/autoload.php';

function forTest(): PairTag
{
    $form = new PairTag('form');
    $form->appendChild(
        (new PairTag('label'))
            ->appendChild(
                (new SingleTag('img'))
                    ->attr('src', 'f1.jpg')
                    ->attr('alt', 'f1 not found')
            )
            ->appendChild(
                (new SingleTag('input'))
                    ->attr('type', 'text')
                    ->attr('name', 'f1')
            )
    )
        ->appendChild(
            (new PairTag('label'))
                ->appendChild(
                    (new SingleTag('img'))
                        ->attr('src', 'f2.jpg')
                        ->attr('alt', 'f2 not found')
                )
                ->appendChild(
                    (new SingleTag('input'))
                        ->attr('type', 'password')
                        ->attr('name', 'f2')
                )
        )
        ->appendChild(
            (new SingleTag('input'))
                ->attr('type', 'submit')
                ->attr('value', 'Send')
        );

    return $form;
}

$a = (new PairTag('a'))->attr('href', '#')->appendChild(new TextNode(''));
echo $a->render();
