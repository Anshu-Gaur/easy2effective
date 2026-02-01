<?php
    $baseUrl = "https://easy2effective.com/";
    $title = "Easy2Effective";
    $metaDescription = "HOme page";
    $canonical = $baseUrl;
    $metaTitle = "Easy2Effective";

    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = "home";
    }

    if($page == "home"){
        $title = "Easy2Effective";
        $canonical = $baseUrl;
    }elseif($page == "about"){
        $title = "About Us | Easy2Effective";
        $metaDescription ="";
        $canonical = $baseUrl . "about";
    }elseif($page == "contact"){
        $title = "Contact Us | Easy2Effective";
        $metaDescription ="";
        $canonical = $baseUrl . "contact";
    }elseif($page == "blog"){
        $title = "Blogs | Easy2Effective";
        $metaDes ="";
        $canonical = $baseUrl . "blog";
    }elseif($page == "health-insurance-blog"){
        $title = "Health Insurance | Easy2Effective";
        $metaDes ="";
        $canonical = $baseUrl . "health-insurance-blog";
    }else if($page == "home-protection-blog"){
        $title = "Home Insurance | Easy2Effective";
        $canonical = $baseUrl . "home-protection-blog";
    }else if($page == "life-insurance-blog"){
        $title = "Life Insurance | Easy2Effective";
        $canonical = $baseUrl . "life-insurance-blog";
    }else if($page == "motor-insurance-blog"){
        $title = "Motor Insurance | Easy2Effective";
        $canonical = $baseUrl . "motor-insurance-blog";
    }else if($page == "property-dealer-blog"){
        $title = "Property Dealer | Easy2Effective";
        $canonical = $baseUrl . "property-dealer-blog";
    }else if($page == "term-insurance-blog"){
        $title = "Term Insurance | Easy2Effective";
        $canonical = $baseUrl . "term-insurance-blog";
    }else if($page == "travel-assistance-blog"){
        $title = "Travel Assistance | Easy2Effective";
        $canonical = $baseUrl . "travel-assistance-blog";
    }else if($page == "term-conditions"){
        $title = "Term & Conditions | Easy2Effective";
        $canonical = $baseUrl . "term-conditions";
    }else if($page == "privacy-policy"){
        $title = "Privacy Policy | Easy2Effective";
        $canonical = $baseUrl . "privacy-policy";
    }else{
        $title = "404 Page Not Found | Easy2Effective";
        $canonical = $baseUrl . "404-page-not-found";
    }
    
    include_once "./includes/header.php";
    include_once "./includes/navbar.php";
?>


<main>
    <?php 
    
        if($page == "home"){
            require_once("./pages/home.php") ;
        }else if($page == "contact"){
            include_once "./pages/contact.php";
        }else if($page == "about"){
            include_once "./pages/about.php";
        }else if($page == "blog"){
            include_once "./pages/blog.php";
        }else if($page == "ayurveda-blog"){
            include_once "./pages/ayurveda_blog.php";
        }else if($page == "health-insurance-blog"){
            include_once "./pages/health_insurance_blog.php";
        }else if($page == "home-protection-blog"){
            include_once "./pages/home_protection_blog.php";
        }else if($page == "life-insurance-blog"){
            include_once "./pages/life_insurance_blog.php";
        }else if($page == "motor-insurance-blog"){
            include_once "./pages/motor_insurance_blog.php";
        }else if($page == "property-dealer-blog"){
            include_once "./pages/property_dealer_blog.php";
        }else if($page == "term-insurance-blog"){
            include_once "./pages/term_insurance_blog.php";
        }else if($page == "travel-assistance-blog"){
            include_once "./pages/travel_assistance_blog.php";
        }else if($page == "term-conditions"){
            include_once "./pages/conditions.php";
        }else if($page == "privacy-policy"){
            include_once "./pages/policy.php";
        }else{
            include_once "./pages/404.php";
        }
    ?>
</main>

<?php
    include_once "./includes/talk.php";
    include_once "./includes/footer.php";
?>