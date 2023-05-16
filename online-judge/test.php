<?php

$curl = curl_init();

$url = 'https://api.codex.jaagrav.in';

$data = http_build_query(array(
    'code' => '#include<bits/stdc++.h>
    using namespace std;
    int main()
    {
      int n;
      cin>>n;
      int ar[n+4];
      for(int i=0;i<n;i++)
      {
        cin>>ar[i];
      }
      sort(ar,ar+n);
      for(int i=0;i<n;i++)
      {
        cout<<ar[i]<<" ";
      }
      return 0;
    }',
    'language' => 'cpp',
    'input' => '5
    3 2 1 5 4'
));

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

$responseObj = json_decode($response);
$output = $responseObj->output;

// Print the output
echo $output;

?>