<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <title>PokeCode</title>
    <link rel="stylesheet" href="styeleide.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/monokai.min.css">
</head>
<body>
    <div class="logo">
        <img src="assets/logo.png" alt="PokeCode Logo">
    </div>
    <header>
        <nav>
            <ul>
                <li><a href="sobre.php">Sobre nós</a></li>
                <li><a href="index.html">Linguagens</a></li>
                <li><a href="ide.php">IDE</a></li>
                <li><a href="questionario.php">Questionario</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="editor-section">
            <!-- Seleção de linguagem -->
            <div class="language-select">
                <label for="language">Escolha a linguagem:</label>
                <select id="language" onchange="changeLanguage()">
                    <option value="javascript" selected>JavaScript</option>
                    <option value="python">Python</option>
                    <option value="cpp">C++</option>
                    <option value="c">C</option>
                    <option value="go">Go</option>
                    <option value="java">Java</option>
                    <option value="php">PHP</option>
                    <option value="csharp">C#</option>
                    <option value="delphi">Delphi</option>
                    <option value="fortran">Fortran</option>
                    <option value="lua">Lua</option>
                    <option value="matlab">Matlab</option>
                    <option value="sql">SQL</option>
                    <option value="visualBasic">Visual Basic</option>
                </select>
            </div>
            <body onload="changeLanguage()">
            <!-- Editor de código -->
            <div id="editor-container">
                <textarea id="code-editor"></textarea>
            </div>
        </div>

        <div id="language-image">
            <img id="language-icon" src="assets/default.png" alt="Linguagem">
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/python/python.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/go/go.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/php/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/sql/sql.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/pascal/pascal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/fortran/fortran.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/lua/lua.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/octave/octave.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/vb/vb.min.js"></script>

    <script>
        const modes = {
            javascript: "javascript",
            python: "python",
            cpp: "text/x-c++src",
            c: "text/x-csrc",
            go: "go",
            java: "text/x-java",
            php: "text/x-php",
            csharp: "text/x-csharp",
            delphi: "text/x-pascal",
            fortran: "text/x-fortran",
            lua: "text/x-lua",
            matlab: "text/x-octave",
            sql: "text/x-sql",
            visualBasic: "text/x-vb"
        };

        const defaultCode = {
            javascript: `console.log("Olá, Mundo!"); // Impressão na Tela -> Olá, Mundo!\n\nconsole.log(2 + 3); // Impressão na Tela -> 5\n\nconsole.log("A soma de 2 + 3 é:", 2 + 3); // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n// Variáveis são como "caixas" que guardam dados.\nlet idade = 25; // 'idade' é considerado um número\nlet nome = "Ana"; // 'nome' é considerado uma string\n\n// Entrada de dados (simulação com prompt)\nidade = parseInt(prompt("Digite sua idade: "));\nconsole.log("Sua idade é:", idade);\n\nif (idade >= 18) { // Se a condição for verdadeira\n    console.log("Você é maior de idade.");\n}\n else if (idade >= 16) { // Se a primeira condição não for verdadeira\n    console.log("Você pode votar, mas não dirigir.");\n}\n else { // Caso nenhuma condição seja verdadeira\n console.log("Você é menor de idade.");\n}\n\nconsole.log("/nExemplo com for:");\n\nfor (let i = 0; i < 5; i++) { // Itera os números: 0, 1, 2, 3, 4\n  console.log("O valor de i é:", i);\n}\nlet contador = 0;\nwhile (contador < 5) { // Enquanto a condição for verdadeira\n  console.log("O contador é:", contador);\n   contador++;\n}\n`,
            python: `print("Olá, Mundo!")  # Impressão na Tela -> Olá, Mundo!\n\nprint(2 + 3)  # Impressão na Tela -> 5\n\nprint("A soma de 2 + 3 é:", 2 + 3)  # Impressão na Tela -> A soma de 2 + 3 é: 5\n\nidade = 25  # 'idade' é considerado um int\nnome = "Ana"  # 'nome' é considerado uma string\n\n# input() sempre retorna uma string.\nidade = input("Digite sua idade: ")\nprint("Sua idade é:", idade)\nidade = int(idade)  # Converte para inteiro\n\nif idade >= 18:  # Se a condição for verdadeira\n    print("Você é maior de idade.")\nelif idade >= 16:  # Se a primeira condição não for verdadeira\n    print("Você pode votar, mas não dirigir.")\nelse:  # Caso nenhuma condição seja verdadeira\n    print("Você é menor de idade.")\n\nprint("/nExemplo com for:")\nfor i in range(5):  # range(5) itera os números: 0, 1, 2, 3, 4\n    print("O valor de i é:", i)\ncontador = 0\nwhile contador < 5:  # Enquanto a condição for verdadeira\n print("O contador é:", contador)\n  contador += 1\n  `,
            c: `#include <stdio.h>\n\nint main() {\n    printf("Olá, Mundo!/n"); // Impressão na Tela -> Olá, Mundo!\n\n    printf("%d/n", 2 + 3); // Impressão na Tela -> 5\n\n    printf("A soma de 2 + 3 é: %d/n", 2 + 3); // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n    // Variáveis são como "caixas" que guardam dados.\n    int idade = 25; // 'idade' é considerado um int\n    char nome[] = "Ana"; // 'nome' é considerado uma string\n\n    // Entrada de dados\n    printf("Digite sua idade: ");\n    scanf("%d", &idade); // Lê a idade como um inteiro\n    printf("Sua idade é: %d/n", idade);\n\n    if (idade >= 18) { // Se a condição for verdadeira\n        printf("Você é maior de idade./n");\n    } else if (idade >= 16) { // Se a primeira condição não for verdadeira\n        printf("Você pode votar, mas não dirigir./n");\n    } else { // Caso nenhuma condição seja verdadeira\n        printf("Você é menor de idade./n");\n    }\n\n    printf("\nExemplo com for:/n");\n    for (int i = 0; i < 5; i++) { // Itera os números: 0, 1, 2, 3, 4\n        printf("O valor de i é: %d/n", i);\n   }\n\n    int contador = 0;\n    while (contador < 5) { // Enquanto a condição for verdadeira\n        printf("O contador é: %d/n", contador);\n        contador++;\n    }\n\n    return 0;\n}`,
            go: 'package main\n\nimport "fmt"\n\nfunc main() {\n    fmt.Println("Olá, Mundo!") // Impressão na Tela -> Olá, Mundo!\n\n    fmt.Println(2 + 3) // Impressão na Tela -> 5\n\n    fmt.Println("A soma de 2 + 3 é:", 2+3) // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n    // Variáveis são como "caixas" que guardam dados.\n    var idade int = 25 // "idade" é considerado um int\n    var nome string = "Ana" // "nome" é considerado uma string\n\n    // Entrada de dados\n    fmt.Print("Digite sua idade: ")\n    fmt.Scanln(&idade)\n    fmt.Println("Sua idade é:", idade)\n\n    if idade >= 18 { // Se a condição for verdadeira\n        fmt.Println("Você é maior de idade.")\n    } else if idade >= 16 { // Se a primeira condição não for verdadeira\n        fmt.Println("Você pode votar, mas não dirigir.")\n    } else { // Caso nenhuma condição seja verdadeira\n        fmt.Println("Você é menor de idade.")\n    }\n\n    fmt.Println("/nExemplo com for:")\n    for i := 0; i < 5; i++ { // Itera os números: 0, 1, 2, 3, 4\n        fmt.Println("O valor de i é:", i)\n    }\n\n    contador := 0\n    for contador < 5 { // Enquanto a condição for verdadeira\n        fmt.Println("O contador é:", contador)\n        contador++\n    }\n}\n',
            java: 'import java.util.Scanner;\npublic class Main {\n    public static void main(String[] args) {\n        System.out.println("Olá, Mundo!"); // Impressão na Tela -> Olá, Mundo!\n        System.out.println(2 + 3); // Impressão na Tela -> 5\n        System.out.println("A soma de 2 + 3 é: " + (2 + 3)); // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n        int idade = 25; // idade é considerado um int\n        String nome = "Ana"; // nome é considerado uma string\n\n        Scanner scanner = new Scanner(System.in);\n        System.out.print("Digite sua idade: ");\n        idade = scanner.nextInt();\n        System.out.println("Sua idade é: " + idade);\n\n        if (idade >= 18) {\n            System.out.println("Você é maior de idade.");\n        }\n else if (idade >= 16) {\n            System.out.println("Você pode votar, mas não dirigir.");\n        }\n else {\n            System.out.println("Você é menor de idade.");\n        }\n        System.out.println("/nExemplo com for:");\n        for (int i = 0; i < 5; i++) {\n            System.out.println("O valor de i é: " + i);\n        }\n        int contador = 0;\n        while (contador < 5) {\n            System.out.println("O contador é: " + contador);\n            contador++;\n        }\n        scanner.close();\n    }\n}\n',
            php: '<?php\n\n// Exemplo básico em PHP\n\n// Impressão na tela\necho "Olá, Mundo!\n"; // Impressão na Tela -> Olá, Mundo!\n\necho 2 + 3 . "\n"; // Impressão na Tela -> 5\n\necho "A soma de 2 + 3 é: " . (2 + 3) . "\n"; // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n// Variáveis são como "caixas" que guardam dados.\n$idade = 25; // "idade" é considerado um inteiro\n$nome = "Ana"; // "nome" é considerado uma string\n\n// Entrada de dados\necho "Digite sua idade: \n";$idade = (int) trim(fgets(STDIN)); // Lê a idade como um inteiro\necho "Sua idade é: $idade/n";\n\n// Estruturas condicionais\nif ($idade >= 18) { // Se a condição for verdadeira\n    echo "Você é maior de idade.\n";}\nelseif ($idade >= 16) { // Se a primeira condição não for verdadeira\n    echo "Você pode votar, mas não dirigir.\n";}\nelse { // Caso nenhuma condição seja verdadeira\n    echo "Você é menor de idade.\n";}\n\necho "\nExemplo com for:\n";for ($i = 0; $i < 5; $i++) { // Itera os números: 0, 1, 2, 3, 4\n    echo "O valor de i é: $i\n";}\n\n$contador = 0;while ($contador < 5) { // Enquanto a condição for verdadeira\n    echo "O contador é: $contador\n";    $contador++;\n}\n\n?>',
            csharp: 'using System;\nclass Program {\n    static void Main() {\n        Console.WriteLine("Olá, Mundo!"); // Impressão na Tela -> Olá, Mundo!\n        Console.WriteLine(2 + 3); // Impressão na Tela -> 5\n        Console.WriteLine("A soma de 2 + 3 é: " + (2 + 3)); // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n        int idade = 25; // idade é considerado um int\n        string nome = "Ana"; // "nome" é considerado uma string\n\n        Console.Write("Digite sua idade: ");\n        idade = int.Parse(Console.ReadLine());\n        Console.WriteLine("Sua idade é: " + idade);\n\n        if (idade >= 18) {\n            Console.WriteLine("Você é maior de idade.");\n        }\n else if (idade >= 16) {\n            Console.WriteLine("Você pode votar, mas não dirigir.");\n        }\n else {\n            Console.WriteLine("Você é menor de idade.");\n        }\n        Console.WriteLine("/nExemplo com for:");\n        for (int i = 0; i < 5; i++) {\n            Console.WriteLine("O valor de i é: " + i);\n        }\n        int contador = 0;\n        while (contador < 5) {\n            Console.WriteLine("O contador é: " + contador);\n            contador++;\n        }\n    }\n}\n',
            delphi: 'program HelloWorld;\nvar\n    idade: Integer;\n    nome: String;\n    i: Integer;\n    contador: Integer;\nbegin\n    Writeln("Olá, Mundo!"); // Impressão na Tela -> Olá, Mundo!\n    Writeln(2 + 3); // Impressão na Tela -> 5\n    Writeln("A soma de 2 + 3 é:", 2 + 3); // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n    idade := 25; // "idade" é considerado um Integer\n    nome := "Ana"; // "nome" é considerado uma String\n    Write("Digite sua idade: "");\n    Readln(idade);\n    Writeln("Sua idade é: ", idade);\n\n    if idade >= 18 then\n        Writeln("Você é maior de idade."")\n    else if idade >= 16 then\n        Writeln("Você pode votar, mas não dirigir.)\n    else\n        Writeln("Você é menor de idade.);\n    Writeln(#10"Exemplo com for:");\n\n    for i := 0 to 4 do\n        Writeln("O valor de i é: , i);\n    contador := 0;\n\n    while contador < 5 do\n    begin\n        Writeln(O contador é: , contador);\n        contador := contador + 1;\n    end;\nend.\n',
            fortran: `program HelloWorld',\n implicit none\n   integer :: idade, contador, i\n   print *, "Olá, Mundo!" ! Impressão na Tela -> Olá, Mundo!\n   print *, 2 + 3 ! Impressão na Tela -> 5\n   print *, "A soma de 2 + 3 é:", 2 + 3 ! Impressão na Tela -> A soma de 2 + 3 é: 5\n\n   ! Variáveis são como "caixas" que guardam dados.\n   idade = 25 ! 'idade' é considerado um inteiro\n   ! Entrada de dados\n   print *, "Digite sua idade: "\n   read *, idade\n   print *, "Sua idade é:", idade\n\n   if (idade >= 18) then ! Se a condição for verdadeira\n    print *, "Você é maior de idade."\n   else if (idade >= 16) then ! Se a primeira condição não for verdadeira\n    print *, "Você pode votar, mas não dirigir."\n   else ! Caso nenhuma condição seja verdadeira\n   print *, "Você é menor de idade."\n   end if\n\n   print *, "/n"Exemplo com for:"\n   do i = 0, 4 ! Itera os números: 0, 1, 2, 3, 4\n   print *, "O valor de i é:", i\n   end do\n   contador = 0\n   do while (contador < 5) ! Enquanto a condição for verdadeira\n   print *, "O contador é:", contador\n   contador = contador + 1\n   end do\n   end program HelloWorld\n`,
            lua: `-- Olá, Mundo!\nprint("Olá, Mundo!") -- Impressão na Tela -> Olá, Mundo!\n\nprint(2 + 3) -- Impressão na Tela -> 5\n\nprint("A soma de 2 + 3 é:", 2 + 3) -- Impressão na Tela -> A soma de 2 + 3 é: 5\n\n-- Variáveis são como "caixas" que guardam dados.\nidade = 25 -- 'idade' é considerado um número\nnome = "Ana" -- 'nome' é considerado uma string\n\n-- Entrada de dados\nio.write("Digite sua idade: ")\nidade = tonumber(io.read()) -- Converte a entrada para número\nprint("Sua idade é:", idade)\n\n-- Condicional\nif idade >= 18 then -- Se a condição for verdadeira\n    print("Você é maior de idade.")\nelseif idade >= 16 then -- Se a primeira condição não for verdadeira\n    print("Você pode votar, mas não dirigir.")\nelse -- Caso nenhuma condição seja verdadeira\n    print("Você é menor de idade.")\nend\n\n-- Exemplo com for\nprint("\nExemplo com for:")\nfor i = 0, 4 do -- Itera os números: 0, 1, 2, 3, 4\n    print("O valor de i é:", i)\nend\n\n-- Exemplo com while\ncontador = 0\nwhile contador < 5 do -- Enquanto a condição for verdadeira\n    print("O contador é:", contador)\n    contador = contador + 1\nend\n`,
            matlab: `% Olá, Mundo!\ndisp("Olá, Mundo!") % Impressão na Tela -> Olá, Mundo!\n\ndisp(2 + 3) % Impressão na Tela -> 5\n\ndisp("A soma de 2 + 3 é: " + string(2 + 3)) % Impressão na Tela -> A soma de 2 + 3 é: 5\n\n% Variáveis são como "caixas" que guardam dados.\nidade = 25; % 'idade' é considerado um número\nnome = "Ana"; % 'nome' é considerado uma string\n% Entrada de dados\nidade = input("Digite sua idade: "); % Solicita entrada do usuário\ndisp("Sua idade é: " + string(idade))\n\n% Condicional\nif idade >= 18\n    disp("Você é maior de idade.")\nelseif idade >= 16\n    disp("Você pode votar, mas não dirigir.")\nelse\n    disp("Você é menor de idade.")\nend\n\n% Exemplo com for\ndisp("Exemplo com for:")\nfor i = 0:4\n    disp("O valor de i é: " + string(i))\nend\n\n% Exemplo com while\ncontador = 0;\nwhile contador < 5\n    disp("O contador é: " + string(contador))\n    contador = contador + 1;\nend\n`,
            sql: `-- Criação de um database\nCREATE DATABASE Loja\n\n-- Seleciona o database criado\nUSE Loja;\n\n-- Criação de uma tabela com declaração dos campos e limites\nCREATE TABLE Produtos (\n    id INT AUTO_INCREMENT PRIMARY KEY,\n    nome VARCHAR(100) NOT NULL,\n    preco DECIMAL(10, 2) NOT NULL,\n    quantidade INT NOT NULL,\n    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP\n);\n\n-- Inserção de uma linha na tabela\nINSERT INTO Produtos (nome, preco, quantidade)\nVALUES ('Caderno', 15.50, 10);\n\n-- Consulta para visualizar os dados inseridos\nSELECT * FROM Produtos;\n\n-- Alteração de dados em uma linha existente\nUPDATE Produtos\nSET preco = 17.00, quantidade = 12\nWHERE id = 1;\n\n-- Consulta novamente para verificar as alterações\nSELECT * FROM Produtos;\n`,
            visualBasic: `Module Program\n    Sub Main()\n        Console.WriteLine("Olá, Mundo!") ' Impressão na Tela -> Olá, Mundo!\n\n        Console.WriteLine(2 + 3) ' Impressão na Tela -> 5\n\n        Console.WriteLine("A soma de 2 + 3 é: " & (2 + 3)) ' Impressão -> A soma de 2 + 3 é: 5\n\n        ' Variáveis são como "caixas" que guardam dados.\n        Dim idade As Integer = 25 ' 'idade' é considerado um número\n        Dim nome As String = "Ana" ' 'nome' é considerado uma string\n\n        ' Entrada de dados\n        Console.Write("Digite sua idade: ")\n        idade = Integer.Parse(Console.ReadLine()) ' Converte entrada para número\n        Console.WriteLine("Sua idade é: " & idade)\n\n        ' Condicional\n        If idade >= 18 Then\n            Console.WriteLine("Você é maior de idade.")\n        ElseIf idade >= 16 Then\n            Console.WriteLine("Você pode votar, mas não dirigir.")\n        Else\n            Console.WriteLine("Você é menor de idade.")\n        End If\n\n        ' Exemplo com for\n        Console.WriteLine("Exemplo com for:")\n        For i As Integer = 0 To 4\n            Console.WriteLine("O valor de i é: " & i)\n        Next\n\n        ' Exemplo com while\n        Dim contador As Integer = 0\n        While contador < 5\n            Console.WriteLine("O contador é: " & contador)\n            contador += 1\n        End While\n    End Sub\nEnd Module\n`,
            cpp:'int main() {\n    std::cout << "Olá, Mundo!" << std::endl; // Impressão na Tela -> Olá, Mundo!\n\n    std::cout << (2 + 3) << std::endl; // Impressão na Tela -> 5\n\n    std::cout << "A soma de 2 + 3 é: " << (2 + 3) << std::endl; // Impressão na Tela -> A soma de 2 + 3 é: 5\n\n    // Variáveis são como "caixas" que guardam dados.\n    int idade = 25; // "idade" é considerado um int\n    std::string nome = "Ana"; // "nome" é considerado uma string\n\n    // Entrada de dados\n    std::cout << "Digite sua idade: ";\n    std::cin >> idade; // Lê a idade como um inteiro\n    std::cout << "Sua idade é: " << idade << std::endl;\n\n    if (idade >= 18) { // Se a condição for verdadeira\n        std::cout << "Você é maior de idade." << std::endl;\n    } else if (idade >= 16) { // Se a primeira condição não for verdadeira\n        std::cout << "Você pode votar, mas não dirigir." << std::endl;\n    } else { // Caso nenhuma condição seja verdadeira\n        std::cout << "Você é menor de idade." << std::endl;\n    }\n\n    std::cout << "/nExemplo com for:" << std::endl;\n    for (int i = 0; i < 5; i++) { // Itera os números: 0, 1, 2, 3, 4\n        std::cout << "O valor de i é: " << i << std::endl;\n    }\n\n    int contador = 0;\n    while (contador < 5) { // Enquanto a condição for verdadeira\n        std::cout << "O contador é: " << contador << std::endl;\n        contador++;\n    }\n\n    return 0;\n}',
        };

        const languageImages = {
            javascript: "assets/javascript.webp",
            python: "assets/python.webp",
            cpp: "assets/cmaismais.webp",
            c: "assets/c.webp",
            go: "assets/go.webp",
            java: "assets/java.webp",
            php: "assets/php.webp",
            csharp: "assets/csharp.webp",
            delphi: "assets/delphi.webp",
            fortran: "assets/fortran.webp",
            lua: "assets/lua.webp",
            matlab: "assets/matlab.webp",
            sql: "assets/sqlNovo.webp",
            visualBasic: "assets/visualbasic.webp"
        };

        const editor = CodeMirror.fromTextArea(document.getElementById("code-editor"), {
            lineNumbers: true,
            mode: "javascript",
            theme: "monokai",
            tabSize: 4,
        });

        function changeLanguage() {
            const language = document.getElementById("language").value;
            editor.setOption("mode", modes[language] || "javascript");
            editor.setValue(defaultCode[language] || "// Código não disponível para esta linguagem.");

            const languageIcon = document.getElementById("language-icon");
            languageIcon.src = languageImages[language] || "assets/default.png";
            languageIcon.alt = `Ícone de ${language}`;
        }
    </script>
</body>
</html>
