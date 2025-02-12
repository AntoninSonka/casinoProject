#include <stdio.h>
#include <stdlib.h>
#include "../genCards/genCards.h"

int main(int argc, char** argv){
    int seed = atoi(argv[1]);
    int deckNum = atoi(argv[2]);
    int cardCount = (argc - 3);
    if(cardCount < 2){
        printf("Error\n");
        return 1;
    }
    struct card* deck = generateDeck(deckNum);
    shuffleDeck(deck, seed, deckNum);
    int valueCount = 0;
    int aceFound = 0;
    for(int i = 0; i < cardCount; i++){
        if(deck[atoi(argv[i + 3])].rank == 1){
            ++aceFound;            
        }
        else if(deck[atoi(argv[i + 3])].rank > 10){
            valueCount += 10;
        }
        else{
            valueCount += deck[atoi(argv[i + 3])].rank;
        }
    }
    for(int i = aceFound; i > 0; --i){
        if((valueCount + 11 + (i - 1)) <= 21){
            valueCount += 11;
        }
        else {
            ++valueCount;
        }
    }
    if(valueCount <= 16){
        printf("Hit\n");
        printf("%d\n", valueCount);
        return 0;
    }
    if(valueCount <= 21){
        printf("Stay\n");
        printf("%d\n", valueCount);
        return 0;
    }
    printf("Bust\n");
    printf("%d\n", valueCount);

    freeDeck(deck);
    return 0;
}
