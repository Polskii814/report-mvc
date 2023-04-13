<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ControllerJson 
{
   private $quoteList;

    private function AllQuotes(): void
    {
        $this->quoteList = array(
            "We cannot solve problems with the kind of thinking we employed when we came up with them. - Albert Einstein",
            "The only way to do great work is to love what you do.- Steve Jobs",
            "If you want to live a happy life, tie it to a goal, not to people or things. - Albert Einstein",
            "The only way to do great work is to love what you do. If you haven`t found it yet, keep looking. Don`t settle. As with all matters of the heart, you`ll know when you find it. - Steve Jobs"
        );
    }

    #[Route('/api/quote',  name: 'api_quote')]
    public function apiQuote(): Response
    {
        $this->AllQuotes();
        $number = random_int(0, count($this->quoteList) - 1);

        $data = [
            'quote' => $this->quoteList[$number],
            'day' => date('Y-m-d'),
            'time' => date('H:i:s'),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }


}