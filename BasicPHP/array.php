 <?php


$books = array(
    '978-3-16-148410-0' => array(
        'title' => 'Book Title 1',
        'author' => 'Author 1',
        'copies' => 5
    ),
    '978-1-40-289462-6' => array(
        'title' => 'Book Title 2',
        'author' => 'Author 2',
        'copies' => 2
    )
);



foreach ($books as $key => $value) {


    echo $key;
    echo "<br>";
    echo $value;
    echo "<br>";

    
}

$members = array(
    'M001' => array(
        'name' => 'Member 1',
        'borrowed_books' => array()
    ),
    'M002' => array(
        'name' => 'Member 2',
        'borrowed_books' => array()
    )
);

$borrowing_records = array();
$fines = array();


// echo "welcome to associate array in php";



// $arr=array("This","That","What");


// // echo $arr[0];


// $favCol=array(

// 'shubham'=>"red",

// 'rohan'=>"Green",
// 'harry'=>"brown"


// );
// //it is same as dictionary

// echo $favCol['harry'];

// foreach($favCol as $key =>$value){

//     echo $value;

//     echo "<br>";
//     echo $key;
//     echo "<br>";
// }



?> 
