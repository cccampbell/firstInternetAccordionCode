<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class accordion extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Accordion';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A beautiful Accordion block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'text';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = ['page'];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
        'render_callback' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'heading' => 'Accordion',
        'sub_text' => 'Welcome to the Accordion block.',
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];


    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Accordion block.'],
    ];


    public function with(): array
    {
        return [
            'heading' => $this->heading(),
            'sub_text' => $this->subText(),
        ];
    }

    public function fields(): array
    {
        $fields = Builder::make('accordion');

        $fields
            ->addText('heading')
            ->addWysiwyg('sub_text')
            ->addRepeater('items', [
                'required' => true,
                'min' => 1,
                'layout' => 'block',
            ])
                ->addText('heading', [
                    'required' => true
                ])
                ->addWysiwyg('text', [
                    'media_upload' => false,
                    'toolbar' => 'basic',
                    'required' => true
                ])
            ->endRepeater();

        return $fields->build();
    }
    public function heading()
    {
        $heading = get_field('heading');
        if ($this->preview && empty($heading)) {
            return $this->example['heading'];
        }
        return get_field('heading');
    }

    public function subText()
    {
        $sub_text = get_field('sub_text');
        if ($this->preview && empty($sub_text)) {
            return $this->example['sub_text'];
        }
        return get_field('sub_text');
    }
}
