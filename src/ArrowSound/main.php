<?php

/* 
Twitter.com/CaptainKenji17
 */

namespace ArrowSound;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\entity\Arrow;
use pocketmine\Player;
use pocketmine\level\sound\ClickSound;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\level\particle\AngryVillagerParticle;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info('Activated');
    }
    public function onDisable(){
        $this->getLogger()->info('Deactivated');
    }
    
    public function onArrowHit(ProjectileHitEvent $event){
        $victim = $event->getEntity();
        $shooter = $victim->getLastDamageCause();
        if($shooter instanceof EntityDamageByEntityEvent){
            $shooter = $shooter->getDamager();
        if($shooter instanceof Player){
            $level->addSound(new ClickSound($shooter->getLocation()));
            $victim->getLevel()->addParticle(new AngryVillagerParticle(self::randVector($entity),(mt_rand()/mt_getrandmax())*2));
        }
        }
    }
}    