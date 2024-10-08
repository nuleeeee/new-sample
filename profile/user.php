<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCORE-ADMIN</title>

    <!-- Bootstrap 5.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <link href='css/buttons.datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/hricon.png">
    <link rel="stylesheet" href="stylesheets/styles-general.css">

    <!-- Data Tables Min -->
    <script type="text/javascript" charset="utf8" src="js/jquery.datatables.min.js"></script>
    <script src="js/datatables.buttons.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>

    <!-- Alertify JS -->
    <link rel=" stylesheet" href="css/alertify.min.css" />
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>

</head>

<body>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                </button>
            </li>
        </ul>
    </div>


    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Large</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="https://getbootstrap.com/docs/5.3/examples/blog/#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Sign up</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="https://getbootstrap.com/docs/5.3/examples/blog/#">World</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">U.S.</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Technology</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Design</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Culture</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Business</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Politics</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Opinion</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Science</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Health</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Style</a>
                <a class="nav-item nav-link link-body-emphasis" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Travel</a>
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="https://getbootstrap.com/docs/5.3/examples/blog/#" class="text-body-emphasis fw-bold">Continue reading...</a></p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-body-secondary">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="https://getbootstrap.com/docs/5.3/examples/blog/#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-body-secondary">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="https://getbootstrap.com/docs/5.3/examples/blog/#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    From the Firehose
                </h3>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">Sample blog post</h2>
                        <p class="blog-post-meta">January 1, 2021 by <a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Mark</a></p>

                        <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
                        <hr>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                    <h2>Blockquotes</h2>
                        <p>This is an example blockquote in action:</p>
                        <blockquote class="blockquote">
                        <p>Quoted text goes here.</p>
                        </blockquote>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                    <h3>Example lists</h3>
                        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout. This is an example unordered list:</p>
                        <ul>
                            <li>First list item</li>
                            <li>Second list item with a longer description</li>
                            <li>Third list item to close it out</li>
                        </ul>
                        <p>And this is an ordered list:</p>
                        <ol>
                            <li>First list item</li>
                            <li>Second list item with a longer description</li>
                            <li>Third list item to close it out</li>
                        </ol>
                        <p>And this is a definition list:</p>
                        <dl>
                            <dt>HyperText Markup Language (HTML)</dt>
                                <dd>The language used to describe and define the content of a Web page</dd>
                            <dt>Cascading Style Sheets (CSS)</dt>
                                <dd>Used to describe the appearance of Web content</dd>
                            <dt>JavaScript (JS)</dt>
                                <dd>The programming language used to build advanced Web sites and applications</dd>
                        </dl>
                    <h2>Inline HTML elements</h2>
                        <p>HTML defines a long list of available inline tags, a complete list of which can be found on the <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element">Mozilla Developer Network</a>.</p>
                        <ul>
                            <li><strong>To bold text</strong>, use <code class="language-plaintext highlighter-rouge">&lt;strong&gt;</code>.</li>
                            <li><em>To italicize text</em>, use <code class="language-plaintext highlighter-rouge">&lt;em&gt;</code>.</li>
                            <li>Abbreviations, like <abbr title="HyperText Markup Language">HTML</abbr> should use <code class="language-plaintext highlighter-rouge">&lt;abbr&gt;</code>, with an optional <code class="language-plaintext highlighter-rouge">title</code> attribute for the full phrase.</li>
                            <li>Citations, like <cite>— Mark Otto</cite>, should use <code class="language-plaintext highlighter-rouge">&lt;cite&gt;</code>.</li>
                            <li><del>Deleted</del> text should use <code class="language-plaintext highlighter-rouge">&lt;del&gt;</code> and <ins>inserted</ins> text should use <code class="language-plaintext highlighter-rouge">&lt;ins&gt;</code>.</li>
                            <li>Superscript <sup>text</sup> uses <code class="language-plaintext highlighter-rouge">&lt;sup&gt;</code> and subscript <sub>text</sub> uses <code class="language-plaintext highlighter-rouge">&lt;sub&gt;</code>.</li>
                        </ul>
                        <p>Most of these elements are styled by browsers with few modifications on our part.</p>
                    <h2>Heading</h2>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                    <h3>Sub-heading</h3>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                        <pre><code>Example code block</code></pre>
                        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                </article>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">Another blog post</h2>
                        <p class="blog-post-meta">December 23, 2020 by <a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Jacob</a></p>

                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                        <blockquote>
                        <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of it.</p>
                        </blockquote>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                    <h3>Example table</h3>
                        <p>And don't forget about tables in these posts:</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Upvotes</th>
                                    <th>Downvotes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alice</td>
                                    <td>10</td>
                                    <td>11</td>
                                </tr>
                                <tr>
                                    <td>Bob</td>
                                    <td>4</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Charlie</td>
                                    <td>7</td>
                                    <td>9</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Totals</td>
                                    <td>21</td>
                                    <td>23</td>
                                </tr>
                            </tfoot>
                        </table>

                        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                </article>

                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">New feature</h2>
                        <p class="blog-post-meta">December 14, 2020 by <a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Chris</a></p>

                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                        <ul>
                            <li>First list item</li>
                            <li>Second list item with a longer description</li>
                            <li>Third list item to close it out</li>
                        </ul>
                        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary rounded-pill" href="https://getbootstrap.com/docs/5.3/examples/blog/#">Older</a>
                    <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
                </nav>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                    </div>

                    <div>
                        <h4 class="fst-italic">Recent posts</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://getbootstrap.com/docs/5.3/examples/blog/#">
                                <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Example blog post title</h6>
                                    <small class="text-body-secondary">January 15, 2023</small>
                                </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://getbootstrap.com/docs/5.3/examples/blog/#">
                                <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">This is another blog post title</h6>
                                    <small class="text-body-secondary">January 14, 2023</small>
                                </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://getbootstrap.com/docs/5.3/examples/blog/#">
                                <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                                    <small class="text-body-secondary">January 13, 2023</small>
                                </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">March 2021</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">February 2021</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">January 2021</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">December 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">November 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">October 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">September 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">August 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">July 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">June 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">May 2020</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">April 2020</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">GitHub</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Twitter</a></li>
                            <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p class="mb-0">
            <a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Back to top</a>
        </p>
    </footer>

</body>

</html>