from PyQt5.QtWidgets import QApplication, QMainWindow, QLabel, QLineEdit, QPushButton, QVBoxLayout, QWidget, QMessageBox
import mysql.connector

class TesteConexaoApp(QMainWindow):
    def __init__(self):
        super().__init__()

        self.setWindowTitle("Teste de Conexão com Banco de Dados")
        self.setGeometry(100, 100, 400, 200)

        self.central_widget = QWidget(self)
        self.setCentralWidget(self.central_widget)

        self.layout = QVBoxLayout()

        self.label_host = QLabel("Host:")
        self.entry_host = QLineEdit()

        self.label_usuario = QLabel("Usuário:")
        self.entry_usuario = QLineEdit()

        self.label_senha = QLabel("Senha:")
        self.entry_senha = QLineEdit()
        self.entry_senha.setEchoMode(QLineEdit.Password)

        self.label_banco = QLabel("Banco:")
        self.entry_banco = QLineEdit()

        self.botao_testar = QPushButton("Testar Conexão")
        self.botao_testar.clicked.connect(self.testar_conexao)

        self.layout.addWidget(self.label_host)
        self.layout.addWidget(self.entry_host)
        self.layout.addWidget(self.label_usuario)
        self.layout.addWidget(self.entry_usuario)
        self.layout.addWidget(self.label_senha)
        self.layout.addWidget(self.entry_senha)
        self.layout.addWidget(self.label_banco)
        self.layout.addWidget(self.entry_banco)
        self.layout.addWidget(self.botao_testar)

        self.central_widget.setLayout(self.layout)

    def testar_conexao(self):
        try:
            # Recupere as informações do servidor e do banco de dados dos campos de entrada
            host = self.entry_host.text()
            usuario = self.entry_usuario.text()
            senha = self.entry_senha.text()
            banco = self.entry_banco.text()

            # Conectar ao banco de dados
            conexao = mysql.connector.connect(
                host=host,
                user=usuario,
                password=senha,
                database=banco
            )

            QMessageBox.information(self, "Sucesso", "Conexão bem-sucedida!")

            # Fechar a conexão após o teste bem-sucedido
            conexao.close()

        except mysql.connector.Error as err:
            QMessageBox.critical(self, "Erro", f"Erro ao conectar ao banco de dados:\n{err}")

if __name__ == "__main__":
    app = QApplication([])
    janela = TesteConexaoApp()
    janela.show()
    app.exec_()
