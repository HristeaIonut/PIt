<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="Scholarly.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body prefix="schema: http://schema.org">
    <div class="header">
        <div class="header-left">
            <a class="home" href="../index.php">PasteIt</a>
        </div>
    </div>
    <div role="contentinfo">
        <ol role="directory">
            <li>
                <a href="#abstract">
                    <span>1 </span>Abstract
                </a>
            </li>
            <li>
                <a href="#introduction">
                    <span>2 </span>Introduction
                </a>
                <ol role="directory">
                    <li>
                        <a href="#purpose">
                            <span>2.1 </span>Purpose
                        </a>
                    </li>
                </ol>
            </li>
            <li>
                <a href="#functionalities">
                    <span>3 </span>Materials and Methods
                </a>
                <ol role="directory">
                    <li>
                        <a href="#functionalities">
                            <span>3.1 </span>Functionalities
                        </a>
                    </li>
                    <li>
                        <a href="#structure">
                            <span>3.2 </span>Structure
                        </a>
                    </li>
                </ol>
            </li>

            <li>
                <a href="#conclusion">
                    <span>4 </span>Conclusion
                </a>
            </li>

            <li>
                <a href="#references">
                    <span>5 </span>References
                </a>
            </li>
        </ol>

        <section typeof="sa:AuthorsList">
            <h2>Authors</h2>
            <ul>
                <li typeof="sa:ContributorRole" property="schema:author">
                    <span typeof="schema:Person" property="schema:author" resource="https://github.com/HristeaIonut">
                        <a property="sa:roleAffiliation" href="https://github.com/HristeaIonut">
                            <meta property="schema:givenName" content="Ionut">
                            <meta property="schema:additionalName" content="Alexandru">
                            <meta property="schema:familyName" content="Hristea">
                            <span property="schema:name">Ionut A. Hristea</span>
                        </a>
                    </span>
                </li>
                <li property="schema:roleContactPoint" typeof="schema:ContactPoint">Mail:
                    <a href="mailto:hristeaionut72@gmail.com" property="schema:email">hristeaionut72@gmail.com</a>
                </li>

                <li typeof="sa:ContributorRole" property="schema:author">
                    <span typeof="schema:Person" property="schema:author"
                        resource="https://github.com/LauraMalinaBenchea">
                        <a property="sa:roleAffiliation" href="https://github.com/LauraMalinaBenchea">
                            <meta property="schema:givenName" content="Malina">
                            <meta property="schema:additionalName" content="Laura">
                            <meta property="schema:familyName" content="Benchea">
                            <span property="schema:name">Malina L. Benchea</span>
                        </a>
                    </span>
                </li>
                <li property="schema:roleContactPoint" typeof="schema:ContactPoint">Mail:
                    <a property="schema:email" href="mailto:malina16fnl@gmail.com"
                        title="Mail">malina16fnl@gmail.com</a>
                </li>

                <li typeof="sa:ContributorRole" property="schema:author">
                    <span typeof="schema:Person" property="schema:author" resource="https://github.com/neculautudor">
                        <a property="sa:roleAffiliation" href="https://github.com/neculautudor">
                            <meta property="schema:givenName" content="Tudor">
                            <meta property="schema:familyName" content="Neculau">
                            <span property="schema:name">Tudor Neculau</span>
                        </a>
                    </span>
                </li>
                <li property="schema:roleContactPoint" typeof="schema:ContactPoint">Mail:
                    <a property="schema:email" href="mailto:neculautudor02@gmail.com"
                        title="Mail">neculautudor02@gmail.com</a>
                </li>
            </ul>
        </section>

    </div>
    <section typeof="sa:Abstract" id="abstract" role="doc-prologue">
        <h2><span>1 </span>Abstract</h2>
        <p>
        A PasteIt is a Web application that allows users to upload and share text online. The most common use is for sharing
        source code or configuration information. There are thousands of pastebins online, often geared towards particular
        groups or focuses. Once text has been uploaded to a pastebin, other users can edit.
        </p>
    </section>
    <section typeof="sa:Introduction" id="introduction" role="doc-introduction">
        <h2><span>2 </span>Introduction</h2>
        <p>
            The goal of this project is to offer a platform through which one can
            share their code among friends, colleagues and even teachers, in a more convenient way.
            Our app can be used by both authenticated and anonymous user.
        </p>
        <p>
            For authenticated users:
        </p>
        <ul>
            <li>
                One can manage their own posts(edit, delete previous posts
                or attach attributes);
            </li>
            <li>
                The option of selecting other users who can modify the posts
                and keep a history for rolling back to anterior versions;
            </li>
            <li>
                Extra options such as "burn after read", "password protected"
                or "reading confirmation - will be able to see who read the post".
            </li>
        </ul>
        <p>
            For anonymous users:
        </p>
        <ul>
            <li>
                The posts can only be public and only after they will have
                passed the Captcha test;
            </li>
            <li>
                The posts will be kept for a maximum of 30 days.
            </li>
        </ul>

    </section>

    <section typeof="sa:Introduction" id="purpose" role="doc-introduction">
        <h2><span>2.1 </span>Purpose</h2>
        <p>
            The purpose of our Website is mainly to make programmers' lives easier. How will that work?
            When a user wants to paste a code, that person can make it pretty. This means that the code becomes easier
            to read and therefore, easier to understand.
            Another advantage is encryption, which allows a user to share it in a secure environment, because we value
            intellectual property and wouldn't want it to be violated.
            Our current goal is to let users know that they are being heard, and this is why we will constantly bring
            changes and updates, according to the received reviews.

        </p>
    </section>

    <section typeof="sa:MaterialsAndMethods" id="functionalities" role="document">
        <h2><span>3.1 </span>Functionalities</h2>
        <p>
            TODO
        </p>
    </section>

    <section typeof="sa:MaterialsAndMethods" id="structure" role="document">
        <h2><span>3.2 </span>Structure</h2>
        <p>
            This app is structured in 5 "subpages";
        </p>
            <ul>
                <li>The main one is the Paste page, where all the magic happens. One may share their code, edit or view someone else's.</li>
                <li>We have a contact page, which helps users reach to an administrator whenever there is a problem, whether or not it regards the code implementation. </li>
                <li>The "How to Use" page is aimed to teach new users about the goal and the ways of using our app.</li>
                <li>The "Register" page is meant for new users, so that they can create an account through which they may use the app in the future. </li>
                <li>The "Login" page will be used for users to enter their already existing account, so they can be able to view they history of what the already pasted, to edit or delete something or rollback to previous changes.</li>
            </ul>

    </section>

    <section typeof="sa:Conclusion" id="conclusion" role="doc-conclusion">
        <h2><span>4 </span>Conclusion</h2>
        <p>
            TODO
        </p>
    </section>

    <section typeof="sa:ReferenceList" id="references" role="doc-bibliography">
        <h2><span>5 </span>References</h2>
        <dl>
            <dt id="scholarly"> Scholarly HTML</dt>
            <dd property="schema:citation" typeof="schema:ScholarlyArticle" resource="https://w3c.github.io/scholarly-html">
                <cite property="schema:name"><a href="https://w3c.github.io/scholarly-html">Scholarly HTML</a></cite>,
                by
                <span property="schema:author" typeof="schema:Person">
                    <span property="schema:name">Tzviya Siegman (Wiley) &</span>
                    <span property="schema:name">Robin Berjon</span>
                </span>
            </dd>
        </dl>
    </section>

</body>

</html>