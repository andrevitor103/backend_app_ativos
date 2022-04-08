create table Usuario {
    endereco int foreign key id_endereco references id (Endereco)
}

create table Endereco {
    id int primary key,
    cidade varchar(80),
    bairro varchar(40),
    rua varchar(20)
}

class Usuario {
    private Endereco $endereco;
    
    public constructor(Endereco $endereco) {
        $this->endereco = $endereco;
    }
}

class Endereco {
    private $cidade;
    private $bairro;
    private $rua;
}

//teste