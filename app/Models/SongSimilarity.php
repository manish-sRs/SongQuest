<?php declare(strict_types=1);
 
namespace App\Models;
 
use Exception;
 
class SongSimilarity
{
    protected $songs = [];
    protected $titleWeight  = 1;
    protected $artistWeight = 1;
    protected $genreWeight = 2;
    protected $albumWeight = 1;
    protected $YearWeight = 1;
 
    public function __construct(array $songs)
    {
        $this->songs = $songs;
        //$this->priceHighRange = max(array_column($properties, 'price'));
    }
 
    public function settitleWeight(float $weight): void
    {
        $this->titleWeight = $weight;
    }
 
    public function setartistWeight(float $weight): void
    {
        $this->artistWeight = $weight;
    }
 
    public function setgenreWeight(float $weight): void
    {
        $this->genreWeight = $weight;
    }

    public function setalbumWeight(float $weight): void
    {
        $this->albumWeight = $weight;
    }
 
    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];
 
        foreach ($this->songs as $song) {
 
            $similarityScores = [];
 
            foreach ($this->songs as $_song) {
                if ($song['id'] === $_song['id']) {
                    continue;
                }
                $similarityScores['song_id_' . $_song['id']] = $this->calculateSimilarityScore($song, $_song);
            }
            $matrix['song_id_' . $song['id']] = $similarityScores;
        }
        return $matrix;
    }
 
    public function getSongsSortedBySimularity(int $songId, array $matrix): array
    {
        $similarities   = $matrix['song_id_' . $songId] ?? null;
        $sortedSongs = [];
            
        if (is_null($similarities)) {
            throw new Exception('Can\'t find similarities with that ID.');
        }
        arsort($similarities);
 
        foreach ($similarities as $songIdKey => $similarity) {
            $id      = intval(str_replace('song_id_', '', $songIdKey));
           
            $songs = array_filter($this->songs, function ($song) use ($id) { return $song['id'] === $id; });
            if (! count($songs)) {
                continue;
            }
            $song = $songs[array_keys($songs)[0]];
            $song['similarity'] = $similarity;
            $sortedSongs[] = $song;
        }
        return $sortedSongs;
    }
 
    protected function calculateSimilarityScore($songA, $songB)
    {
        
        $songAFeatures = strVal($songA['genre_id']);
 
        
        $songBFeatures = strVal($songB['genre_id']);
 
 
        return array_sum([
            (Similarity::hamming($songAFeatures, $songBFeatures) * $this->titleWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$songA['year']], 0, $this->YearWeight),
                Similarity::minMaxNorm([$songB['year']], 0, $this->YearWeight)
            ) * $this->titleWeight),
            (Similarity::jaccard($songA['album'], $songB['album']) * $this->albumWeight)
        ]) / ($this->titleWeight + $this->artistWeight + $this->genreWeight);
    }
}