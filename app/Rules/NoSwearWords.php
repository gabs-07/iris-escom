<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoSwearWords implements ValidationRule
{
    /**
     * Lista de palabras inapropiadas a filtrar
     */
    private array $swearWords = [
        // Palabras vulgar/ofensivas comunes
        'puto', 'puta', 'pendejo', 'pendeja', 'idiota', 'imbécil',
        'boludo', 'boluda', 'mierda', 'cagada', 'carajo', 'jodido',
        'jodida', 'bastardo', 'bastarda', 'hijo de puta', 'hdp',
        'putazo', 'putadera', 'joto', 'maricón', 'marica', 'gay',
        
        // Insultos por origen/etnia
        'negro', 'negra', 'cholo', 'chola', 'indio', 'india',
        'gitano', 'gitana', 'mora', 'moro', 'chino', 'china',
        'judio', 'judia', 'árabe', 'arabe',
        
        // Insultos por condición física o mental
        'estúpido', 'estúpida', 'tarado', 'tarada', 'retrasado',
        'retrasada', 'sordo', 'sorda', 'cojo', 'coja', 'tuerto',
        'tuerta', 'ciego', 'ciega', 'loco', 'loca',
        
        // Insultos por clase social o apariencia
        'pobre', 'gordo', 'gorda', 'flaco', 'flaca', 'viejo', 'vieja',
        'mocoso', 'mocosa', 'mugroso', 'mugrosa', 'sucio', 'sucia',
        
        // Insultos relacionados con orientación sexual
        'marica', 'tortillera', 'fache', 'facha', 'fascista',
        'lesbiana', 'lesbiana',
        
        // Más groserías comunes
        'cabrón', 'cabrona', 'cabron', 'cabrones', 'cabronas',
        'hijoputa', 'hijo puta', 'soplapolla', 'gilipolla', 'gilippollas',
        'gilipollas', 'gilipollazo', 'mamón', 'mamona', 'capullo',
        'malnacido', 'malnacida', 'sinvergüenza', 'sinverguenza',
        'desgraciado', 'desgraciada', 'desalmado', 'desalmada',
        
        // Palabras ofensivas variantes y derivadas
        'cojudo', 'cojuda', 'culiao', 'culía', 'conchesumadre',
        'conchaumare', 'conchasumadre', 'concha',
        'peje', 'pejepuerta', 'joto', 'jotera', 'puto',
        'maña', 'maño', 'hijadeputa', 'hijadeputas',
        
        // Expresiones ofensivas más largas (como alternativas)
        'qué hijo de puta', 'maldita sea', 'maldito sea',
    ];

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $lowerValue = strtolower($value);

        foreach ($this->swearWords as $word) {
            // Búsqueda flexible que detecta la palabra incluso dentro de un párrafo
            // Usa lookahead y lookbehind para no capturar como parte de otra palabra
            $pattern = '(?<![a-záéíóúñ0-9_])' . preg_quote($word, '/') . '(?![a-záéíóúñ0-9_])';
            if (preg_match('/' . $pattern . '/iu', $lowerValue)) {
                $fail('Este contenido no es apto para esta plataforma.');
                return;
            }
        }
    }
}
