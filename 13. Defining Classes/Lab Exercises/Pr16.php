<?php

class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon[][]
     */
    private $pokemons;

    /**
     * Trainer constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    public function catchPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[$pokemon->getElement()][] = $pokemon;
    }

    public function recieveBadge(): void
    {
        $this->badges++;
    }

    public function hasPokemonsByElement(string $element): bool
    {
        return key_exists($element, $this->pokemons) && count($this->pokemons[$element]) > 0;
    }

    public function hitPokemons(int $dmg): void
    {
        foreach ($this->pokemons as $type => $pokemonsByType) {
            foreach ($pokemonsByType as $key => $pokemon){
                $pokemon->hit($dmg);
                if (!$pokemon->isAlive()) {
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }

    public function __toString(): string
    {
        $pokemonCount = 0;
        foreach ($this->pokemons as $pokemonsByType){
            $pokemonCount += count($pokemonsByType);
        }

        return $this->name . ' ' . $this->badges . ' ' . $pokemonCount;
    }

    public function getBadges(): int
    {
        return $this->badges;
    }
}

class Pokemon
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $health;

    /**
     * @var string
     */
    private $element;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param int $health
     * @param string $element
     */
    public function __construct(string $name, int $health, string $element)
    {
        $this->name = $name;
        $this->health = $health;
        $this->element = $element;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    public function isAlive(): bool
    {
        return $this->getHealth() > 0;
    }

    public function hit(int $dmg): void
    {
        $this->health -= max(0, $dmg);
    }

}
/** @var Trainer[] $trainers */
$trainers = [];

$line = readline();

while ($line !== "Tournament"){
    list($trainerName, $pokemonName,$element, $health) = explode(" ", $line);
    if (!key_exists($trainerName, $trainers)){
        $trainers[$trainerName] = new Trainer($trainerName);
    }
    $trainer = $trainers[$trainerName];
    $trainer->catchPokemon(new Pokemon($pokemonName, $health, $element));

    $line = readline();
}

$line = readline();

while ($line !== "End"){
    foreach ($trainers as $trainer){
        if ($trainer->hasPokemonsByElement($line)){
            $trainer->recieveBadge();
        }
        else{
            $trainer->hitPokemons(10);
        }
    }
    $line = readline();
}

uksort($trainers, function ($k1, $k2) use ($trainers){
    $trainer1 = $trainers[$k1];
    $trainer2 = $trainers[$k2];

    return $trainer2->getBadges() <=> $trainer1->getBadges();
});

echo implode(PHP_EOL, $trainers);