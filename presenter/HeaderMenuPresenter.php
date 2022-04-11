<?php
namespace Themes\Xpedia\Presenter;

use Nwidart\Menus\MenuItem;
use Nwidart\Menus\Presenters\Presenter;

class HeaderMenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL.'<ul>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
        //$navigation_ext = \View::make('partials.header.navigation.navigation-ext');
        return PHP_EOL.'</ul>'.PHP_EOL;
    }

    public function getCloseMegaTagWrapper()
    {
        return PHP_EOL.'</div>
                    </div>'.PHP_EOL;
    }

    public function getOpenMegaTagWrapper()
    {
        return PHP_EOL.'<div class="gfx-mega-content">
                            <div class="row">'.PHP_EOL;
    }

    public function getOpenMegaColumnTagWrapper()
    {
        return PHP_EOL.'<div class="col-lg-3 col-sm-3">
                            <ul class="mega-menu-list">'.PHP_EOL;
    }

    public function getCloseMegaColumnTagWrapper()
    {
        return PHP_EOL.'     </ul>
                         </div>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        $link = '<li><a class="menu-button '.$this->getActiveState($item, ' current').'" '.$this->getActiveState($item).' href="'.$item->getUrl().'" '.$item->getAttributes().'>';
        $link .= ' '. $item->title . '</a></li>'.PHP_EOL;
        return $link;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class="current"')
    {
        return $item->isActive() ? $state : null;
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'current')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getDividerWrapper()
    {
        return '';
    }

    /**
     * {@inheritdoc }.
     */
    public function getHeaderWrapper($item)
    {
        return '';
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {
        return '<li>
                  <div class="dropdown-wrapper menu-button">
                      <a class="menu-button '.$this->getActiveState($item, ' current').$this->getActiveStateOnChild($item, ' current').'" href="'.$item->getUrl().'">
                        '.$item->title.'
                      </a>
                      <div class="drop-menu">
                        '.$this->getChildMenuItems($item).'
                      </div>
			      </div>
		      	</li>'
        .PHP_EOL;
    }

    public function getMenuWithoutDropdownWrapperMenu($item)
    {
        $link = '<a class="menu-button" '.$this->getActiveState($item).' href="'.$item->getUrl().'" '.$item->getAttributes().'>';
        $link .= ' '. $item->title . '</a>'.PHP_EOL;
        return $link;
    }

    public function getChildMenuItems(MenuItem $item)
    {
        $results = '';
        if($item->hasChilds()) {
            foreach ($item->getChilds() as $child) {
                if ($child->hidden()) {
                    continue;
                }

                if ($child->hasSubMenu()) {
                    $results .= $this->getMultiLevelDropdownWrapper($child);
                } elseif ($child->isHeader()) {
                    $results .= $this->getHeaderWrapper($child);
                } elseif ($child->isDivider()) {
                    $results .= $this->getDividerWrapper();
                } else {
                    $results .= $this->getMenuWithoutDropdownWrapperMenu($child);
                }
            }
            return $results;
        }
        foreach ($item->getChilds() as $child) {
            if ($child->hidden()) {
                continue;
            }

            if ($child->hasSubMenu()) {
                $results .= $this->getMultiLevelDropdownWrapper($child);
            } elseif ($child->isHeader()) {
                $results .= $this->getHeaderWrapper($child);
            } elseif ($child->isDivider()) {
                $results .= $this->getDividerWrapper();
            } else {
                $results .= $this->getMenuWithoutDropdownWrapper($child);
            }
        }

        return $results;
    }

    /**
     * @param $item
     * @return string
     */
    public function getMegaMenuWithDropDownWrapper($item)
    {
        return '<li class="c-menu-type-classic '.$this->getActiveStateOnChild($item, ' current').'">
		          <a href="#" class="c-link dropdown-toggle">
					'.$item->getIcon().' '.$item->title.'
			      </a>
			      <ul class="dropdown-menu c-menu-type-classic c-pull-left">
			        '.$this->getMegaMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }

    /**
     * @param \Nwidart\Menus\MenuItem $item
     * @return string
     */
    public function getMultiLevelDropdownWrapper($item)
    {
        return '<li class="'.$this->getActiveStateOnChild($item, ' current').'">
		          <a href="'.$item->getUrl().'">
					'.$item->getIcon().' '.$item->title.'
			      </a>
			      <ul>
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }
}
