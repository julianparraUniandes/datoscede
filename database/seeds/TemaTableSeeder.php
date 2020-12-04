<?php

use Illuminate\Database\Seeder;
use App\Tema;
class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tema = new Tema();
        $tema->name = "Agricultura";
        $tema->name_en = "Agriculture";
        $tema->texto = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->texto_en = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->imgPath = "img/temas/agricultura.jpg";
        $tema->icon = "img/cede-icon/temas/bases-agricultura.png";
        $tema->slug_es = "agricultura";
        $tema->slug_en = "agriculture";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Cartografía y Mapas";
        $tema->name_en = "Cartography and Maps";
        $tema->texto = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->texto_en = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->imgPath = "public/img/temas/AqbatRTclj5v3sDmGYR5adVqWcTyHSotnsJgFNkQ.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-cartografia-y-mapas.png";
        $tema->slug_es = "cartografia-y-mapas";
        $tema->slug_en = "cartography-and-maps";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Conflicto y Violencia";
        $tema->name_en = "Conflict and Violence";
        $tema->texto = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->texto_en = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->imgPath = "public/img/temas/rvdG3UmhLY7eAH8GUtVeyCrgDPkcDYvieVo4ZpIY.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-conflicto.png";
        $tema->slug_es = "conflicto-y-violencia";
        $tema->slug_en = "conflict-and-violence";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Demografía y Población";
        $tema->name_en = "Demographics and Population";
        $tema->texto = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->texto_en = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->imgPath = "public/img/temas/AjkOemlR0j5V5nPTP9udMd3NhJNdHvdAZWIyTN44.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-demografia-y-poblacion.png";
        $tema->slug_es = "demografia-y-poblacion";
        $tema->slug_en = "demographics-and-population";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Desarrollo Social";
        $tema->name_en = "Social Development";
        $tema->texto = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->texto_en = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->imgPath = "public/img/temas/Z8yQlQn5uvkl73FCiQBnjn3g73ApeWR1mX4AOxOZ.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-desarrollo-social.png";
        $tema->slug_es = "desarrollo-social";
        $tema->slug_en = "social-development";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Educación";
        $tema->name_en = "Education";
        $tema->texto = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->texto_en = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->imgPath = "public/img/temas/6vPsMkkyYH4GCO5zANahQzo2uO8NnzYNl96CEtw4.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-educacion.png";
        $tema->slug_es = "educacion";
        $tema->slug_en = "education";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Medio Ambiente";
        $tema->name_en = "Environment";
        $tema->texto = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->texto_en = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->imgPath = "public/img/temas/AqbatRTclj5v3sDmGYR5adVqWcTyHSotnsJgFNkQ.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-medio-ambiante.png";
        $tema->slug_es = "medio-ambiente";
        $tema->slug_en = "environment";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Mercado Laboral";
        $tema->name_en = "Labour Market";
        $tema->texto = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->texto_en = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->imgPath = "public/img/temas/rvdG3UmhLY7eAH8GUtVeyCrgDPkcDYvieVo4ZpIY.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-mercado-laboral.png";
        $tema->slug_es = "mercado-laboral";
        $tema->slug_en = "labour-market";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Movilidad y Transporte";
        $tema->name_en = "Mobility and Transport";
        $tema->texto = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->texto_en = "The Agriculture section contains a set of databases related to the activity of the primary sector of the economy, excluding mining. For Colombia, it is possible to find databases at the municipality and aggregate level of different issues such as major crops production, agricultural credit, input prices, as well as sector-specific surveys. Also, it is possible to access to external information systems of foreign countries, which include sectoral information worldwide";
        $tema->imgPath = "public/img/temas/AjkOemlR0j5V5nPTP9udMd3NhJNdHvdAZWIyTN44.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-mobilidad-y-transporte.png";
        $tema->slug_es = "movilidad-y-transporte";
        $tema->slug_en = "mobility-and-transport";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Percepción y Opinión";
        $tema->name_en = "Perception and Opinion";
        $tema->texto = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->texto_en = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->imgPath = "public/img/temas/Z8yQlQn5uvkl73FCiQBnjn3g73ApeWR1mX4AOxOZ.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-percepcion-y-opinion.png";
        $tema->slug_es = "percepcion-y-opinion";
        $tema->slug_en = "perception-and-opinion";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Salud";
        $tema->name_en = "Health";
        $tema->texto = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->texto_en = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->imgPath = "public/img/temas/6vPsMkkyYH4GCO5zANahQzo2uO8NnzYNl96CEtw4.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-salud.png";
        $tema->slug_es = "salud";
        $tema->slug_en = "health";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Sector Privado";
        $tema->name_en = "Private Sector";
        $tema->texto = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->texto_en = "Banking and Finance section lets you download databases related to the banking sector. In particular, you can download the Financial Services Survey in Bogota produced by The National Administrative Department of Statistics (DANE) commissioned by Asobancaria, which provides detailed information on access to financial products and services of colombians.";
        $tema->imgPath = "public/img/temas/Z8yQlQn5uvkl73FCiQBnjn3g73ApeWR1mX4AOxOZ.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-sector-privado.png";
        $tema->slug_es = "sector-privado";
        $tema->slug_en = "private-sector";
        $tema->save();

        $tema = new Tema();
        $tema->name = "Sector Público";
        $tema->name_en = "Public Sector";
        $tema->texto = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->texto_en = "The Cartography and Maps section contains a set of files in image and E00 formats on various topics, including forest and not forests cover, and road network of about 76 Colombian municipalities in manzana level scale. It also allows access to external information systems that present geo-referenced socio-economic and environmental data worldwide.";
        $tema->imgPath = "public/img/temas/6vPsMkkyYH4GCO5zANahQzo2uO8NnzYNl96CEtw4.jpeg";
        $tema->icon = "img/cede-icon/temas/bases-datos-gobierno.png";
        $tema->slug_es = "sector-publico";
        $tema->slug_en = "public-sector";
        $tema->save();

    }
}
