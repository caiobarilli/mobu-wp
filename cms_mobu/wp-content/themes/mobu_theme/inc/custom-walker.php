<?php

/**
 * Classe Smooth_Scroll_Walker
 *
 * Esta classe estende a classe Walker_Nav_Menu e adiciona a classe "smooth-scroll"
 * diretamente aos elementos <a> do menu de navegação.
 */
class Smooth_Scroll_Walker extends Walker_Nav_Menu
{
    /**
     * Adiciona classes personalizadas aos elementos de menu
     *
     * @param string $output
     * @param object $item
     * @param int $depth
     * @param array $args
     * @param int $id
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $output .= '<li class="' . esc_attr(implode(' ', $classes)) . '">';

        $attributes = '';
        !empty($item->attr_title) && $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) && $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) && $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) && $attributes .= ' href="' . esc_attr($item->url) . '"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' class="smooth-scroll">'; // Adiciona a classe "smooth-scroll" diretamente na tag <a>
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
