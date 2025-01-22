<?php

class HomepageController
{
    public $uri = 'https://admin.maalhidayahkauman.sch.id/api';

    // Method untuk menampilkan semua artikel
    public function index()
    {
        return $this->fetchArticles();
    }

    // Method untuk mendapatkan artikel dengan pagination
    // public function getArticlesPaginasi($total)
    // {
    //     $response = $this->fetchData("/articles/{$total}/paginasi");
    //     // Memeriksa apakah data berisi atribut 'data' yang merupakan array artikel
    //     if (isset($response['data']) && is_array($response['data'])) {
    //         return $response['data'];
    //     }
    //     throw new \Exception('Invalid data format received from API for paginated articles.');
    // }

    // Method untuk mendapatkan artikel dengan pagination dan sorting by created_at
    public function getArticlesPaginasi($total)
    {
        $response = $this->fetchData("/articles/{$total}/paginasi");

        // Memeriksa apakah data berisi atribut 'data' yang merupakan array artikel
        if (isset($response['data']) && is_array($response['data'])) {
            $articles = $response['data'];

            // Sorting articles berdasarkan created_at secara descending
            usort($articles, function ($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });

            return $articles;
        }

        throw new \Exception('Invalid data format received from API for paginated articles.');
    }

    // Method untuk mendapatkan artikel berdasarkan slug
    public function getOneArticle($slug)
    {
        return $this->fetchArticleBySlug($slug);
    }

    public function getCategory()
    {
        return $this->fetchData('/categories');
    }

    public function getOneCategory($id)
    {
        $categoryData = $this->fetchData("/categories/{$id}");


        if (isset($categoryData['category_name'])) {
            return $categoryData['category_name'];
        }

        return null;
    }


    // Method untuk mendapatkan jenis
    public function getJenis()
    {
        return $this->fetchData('/jenises');
    }

    public function getOneJenis($id)
    {
        $jenisData = $this->fetchData("/jenises/{$id}");


        if (isset($jenisData['jenis_name'])) {
            return $jenisData['jenis_name'];
        }

        return null;
    }

    // Method untuk mendapatkan pendidikan
    public function getPendidikan()
    {
        return $this->fetchData('/pendidikans');
    }

    public function getOnePendidikan($id)
    {
        $pendidikanData = $this->fetchData("/pendidikans/{$id}");


        if (isset($pendidikanData['pendidikan_name'])) {
            return $pendidikanData['pendidikan_name'];
        }

        return null;
    }

    // Method untuk mendapatkan tingkat
    public function getTingkat()
    {
        return $this->fetchData('/tingkats');
    }

    public function getOneTingkat($id)
    {
        $tingkatData = $this->fetchData("/tingkats/{$id}");


        if (isset($tingkatData['tingkat_name'])) {
            return $tingkatData['tingkat_name'];
        }

        return null;
    }
    // Method untuk mendapatkan tingkat
    public function getContact()
    {
        $response = $this->fetchData('/contact');

        // Memeriksa apakah data memiliki atribut 'contacts'
        if (isset($response['contacts']) && is_array($response['contacts'])) {
            return $response['contacts'];
        }

        throw new \Exception('Invalid data format received from API for contacts.');
    }

    public function countContacts()
    {
        $contacts = $this->getContact(); // Ambil array contacts
        return count($contacts); // Hitung jumlah elemen di dalam array
    }

    public function countContactsByPendidikanAndSubject($pendidikan, $subject)
    {
        try {
            $contacts = $this->getContact(); // Ambil array contacts

            // Filter kontak dengan pendidikan dan subject sesuai kondisi
            $filteredContacts = array_filter($contacts, function ($contact) use ($pendidikan, $subject) {
                return isset($contact['pendidikan']) && $contact['pendidikan'] === $pendidikan
                    && isset($contact['subject']) && $contact['subject'] === $subject;
            });

            // Hitung jumlah elemen hasil filter
            return count($filteredContacts); // Jika kosong, akan otomatis mengembalikan 0
        } catch (\Exception $e) {
            // Tangani error dengan mengembalikan 0 sebagai fallback
            return 0;
        }
    }

    public function countContactsByPendidikanSubjectAndAsrama($pendidikan, $subject, $asrama)
    {
        try {
            $contacts = $this->getContact(); // Ambil array contacts

            // Filter kontak berdasarkan pendidikan, subject, dan asrama
            $filteredContacts = array_filter($contacts, function ($contact) use ($pendidikan, $subject, $asrama) {
                // Ambil asrama dari field message
                $messageAsrama = $this->extractAsramaFromMessage($contact['message'] ?? '');

                return isset($contact['pendidikan'], $contact['subject'])
                    && $contact['pendidikan'] === $pendidikan
                    && $contact['subject'] === $subject
                    && $messageAsrama === $asrama;
            });

            // Hitung jumlah elemen hasil filter
            return count($filteredContacts); // Jika kosong, akan otomatis mengembalikan 0
        } catch (\Exception $e) {
            // Tangani error dengan mengembalikan 0 sebagai fallback
            return 0;
        }
    }

    public function checkEmailAndPendidikan($email, $pendidikan)
    {
        try {
            $contacts = $this->getContact(); // Ambil array contacts

            // Filter kontak berdasarkan email dan pendidikan
            $filteredContacts = array_filter($contacts, function ($contact) use ($email, $pendidikan) {
                return isset($contact['email'], $contact['pendidikan'])
                    && $contact['email'] === $email
                    && $contact['pendidikan'] === $pendidikan;
            });

            // Jika ada kontak yang memenuhi kriteria, kembalikan true, jika tidak false
            return !empty($filteredContacts);
        } catch (\Exception $e) {
            // Tangani error dengan mengembalikan false sebagai fallback
            return false;
        }
    }


    // Fungsi untuk mengekstrak asrama dari message
    private function extractAsramaFromMessage($message)
    {
        // Cari asrama di dalam message dengan regex
        $matches = [];
        preg_match('/Asrama: (.+)/', $message, $matches);

        // Jika ditemukan, kembalikan asrama, jika tidak, null
        return $matches[1] ?? null;
    }



    // Method untuk mendapatkan artikel berdasarkan satu tipe
    public function getArticleByOneTypes($type, $typeSlug)
    {
        return $this->fetchData("/articles/{$type}/{$typeSlug}");
    }

    // Method untuk mendapatkan artikel berdasarkan dua tipe
    public function getArticleByTwoTypes($type1, $type1Slug, $type2, $type2Slug)
    {
        return $this->fetchData("/articles/{$type1}/{$type1Slug}/{$type2}/{$type2Slug}");
    }

    // Method untuk mendapatkan artikel berdasarkan tiga tipe
    public function getArticleByThreeTypes($type1, $type1Slug, $type2, $type2Slug, $type3, $type3Slug)
    {
        return $this->fetchData("/articles/{$type1}/{$type1Slug}/{$type2}/{$type2Slug}/{$type3}/{$type3Slug}");
    }

    // Method untuk mendapatkan artikel berdasarkan empat tipe
    public function getArticleByFourTypes($type1, $type1Slug, $type2, $type2Slug, $type3, $type3Slug, $type4, $type4Slug)
    {
        return $this->fetchData("/articles/{$type1}/{$type1Slug}/{$type2}/{$type2Slug}/{$type3}/{$type3Slug}/{$type4}/{$type4Slug}");
    }

    // Fungsi untuk mengambil data dari API
    private function fetchData($endpoint)
    {
        $url = $this->uri . $endpoint;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // Menghentikan eksekusi dan menampilkan halaman 404.php
            header("Location: /404.php");
            exit();
        }

        curl_close($ch);

        // Debug output
        $data = json_decode($response, true);
        if (!is_array($data)) {
            throw new \Exception('Invalid data format received from API.');
        }

        return $data;
    }

    // Fungsi untuk mengambil artikel
    private function fetchArticles()
    {
        return $this->fetchData('/articles');
    }

    // Fungsi untuk mengambil artikel berdasarkan slug
    private function fetchArticleBySlug($slug)
    {
        return $this->fetchData("/article/{$slug}");
    }
    function sendContactData($contactData)
    {
        $url = 'https://admin.maalhidayahkauman.sch.id/api/contact';
        // $url = 'http://127.0.0.1:8000/api/contact';

        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($contactData),
            ],
        ];


        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            die('Error occurred');
        }

        return json_decode($result);
    }
}

function truncateText($text, $maxLength)
{
    return strlen($text) > $maxLength ? substr($text, 0, $maxLength) . '...' : $text;
}


// Contoh penggunaan
try {
    $controller = new HomepageController(); // Misalnya, mengambil halaman 1
} catch (\Exception $e) {
    $error_message = 'Error: ' . $e->getMessage();
}
