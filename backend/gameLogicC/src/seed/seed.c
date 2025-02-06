#include <stdio.h>
#include <time.h>
#include <stdlib.h>

int main(){
    srand(time(NULL));
    int seed = rand() % 2147483648;
    printf("%d\n", seed);
    return 0;
}
