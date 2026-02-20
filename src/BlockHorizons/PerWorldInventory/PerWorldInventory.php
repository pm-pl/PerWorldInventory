<?php

declare(strict_types=1);

namespace BlockHorizons\PerWorldInventory;

use BlockHorizons\PerWorldInventory\player\PlayerManager;
use BlockHorizons\PerWorldInventory\world\WorldManager;
use pocketmine\plugin\PluginBase;
use bStats\PocketmineMp\Metrics;

final class PerWorldInventory extends PluginBase{

	/** @var PlayerManager */
	private $player_manager;

	/** @var WorldManager */
	private $world_manager;

	public function onEnable() : void{
		// Initialize metrics
        new Metrics($this, 29644);

		$this->player_manager = new PlayerManager($this);
		$this->world_manager = new WorldManager($this);
	}

	public function onDisable() : void{
		$this->world_manager->close();
	}

	/**
	 * @return PlayerManager
	 * @internal
	 */
	public function getPlayerManager() : PlayerManager{
		return $this->player_manager;
	}

	/**
	 * @return WorldManager
	 * @internal
	 */
	public function getWorldManager() : WorldManager{
		return $this->world_manager;
	}
}
