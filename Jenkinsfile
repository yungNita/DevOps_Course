pipeline {
    agent any

    environment {
        EMAIL_CC = 'srengty@gmail.com'
        PROJECT_FOLDER = 'DevOps_Course'
    }

    triggers {
        pollSCM('H/5 * * * *')
    }

    options {
        timestamps()
        ansiColor('xterm')
    }

    stages {
        stage('Clone Repository') {
            steps {
                script {
                    def repoExists = fileExists("${PROJECT_FOLDER}/.git")
                    if (!repoExists) {
                        sh "git clone --branch Final https://github.com/yungNita/DevOps_Course.git ${PROJECT_FOLDER}"
                    } else {
                        dir("${PROJECT_FOLDER}") {
                            sh 'git reset --hard'
                            sh 'git clean -fd'
                            sh 'git pull origin Final'
                        }
                    }
                }
            }
        }

        stage('Install Composer Dependencies') {
            steps {
                dir("${PROJECT_FOLDER}") {
                    sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
                }
            }
        }

        stage('Install NPM and Build') {
            steps {
                dir("${PROJECT_FOLDER}") {
                    sh '''
                    npm install
                    npm run build || npm run prod
                    '''
                }
            }
        }
    }

    post {
        always {
            cleanWs()
        }
        
        success {
            echo "✅ Build successful"
        }

        failure {
            emailext(
                subject: "❌ Build Failed: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                body: """
                <p>Jenkins job <b>${env.JOB_NAME}</b> failed on build <b>#${env.BUILD_NUMBER}</b>.</p>
                <p><a href="${env.BUILD_URL}">View Build Logs</a></p>
                """,
                mimeType: 'text/html',
                to: "${EMAIL_CC}",
                replyTo: "${EMAIL_CC}",
                attachLog: true
            )
        }
    }
}