<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use App\Models\Thematique;


class Page extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'numero',
        'nom',
        'thematique_id',
        'date',
        'objet',
        'lieu',
        'flag',
        'latitude',
        'longitude',
        'description',

    ];


    public function thematique()
    {
        return $this->belongsTo(Thematique::class);
    }

    public $appends = [
        'coordinate', 'map_popup_content',
    ];


    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'nom' => $this->nom, 'type' => __('page.page'),
        ]);
        $link = '<a href="'.route('pages.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->nom;
        $link .= '</a>';

        return $link;
    }

    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('page.nom').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('page.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
